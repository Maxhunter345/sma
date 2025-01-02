<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Prestasi;
use App\Models\News;
use App\Models\Ppdb;
use App\Models\BorrowRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Imports\PpdbImport;

class AdminController extends Controller
{    
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function elearning()
    {
        return view('admin.elearning');
    }

    public function enews()
{
    $news = News::orderBy('created_at', 'desc')->get();
    return view('admin.newsadmin', compact('news'));
}

public function storeNews(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'required|image',
        'content' => 'required',
        'writer_name' => 'required|string|max:255',
        'published_date' => 'required|date',
    ]);

    if ($request->hasFile('additional_images')) {
        $additionalImages = [];
        foreach ($request->file('additional_images') as $file) {
            $path = $file->store('news', 'public');
            $additionalImages[] = $path;
        }
        $news->additional_images = json_encode($additionalImages);
    }    

    $imagePath = $request->file('image')->store('news', 'public');

    News::create([
        'title' => $request->title,
        'image' => $imagePath,
        'content' => $request->content,
        'writer_name' => $request->writer_name,
        'published_date' => $request->published_date,
    ]);

    return redirect()->route('admin.enews')->with('success', 'Berita berhasil ditambahkan.');
}

public function newsUpdate(Request $request, News $news)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'writer_name' => 'required|string|max:255',
        'published_date' => 'required|date',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('news', 'public');
        $news->update(['image' => $imagePath]);
    }

    if ($request->hasFile('additional_images')) {
        $additionalImages = json_decode($news->additional_images) ?? [];
        foreach ($request->file('additional_images') as $file) {
            $path = $file->store('news', 'public');
            $additionalImages[] = $path;
        }
        $news->additional_images = json_encode($additionalImages);
    }    

    $news->update([
        'title' => $request->title,
        'content' => $request->content,
        'writer_name' => $request->writer_name,
        'published_date' => $request->published_date,
    ]);

    return redirect()->route('admin.enews')->with('success', 'Berita berhasil diperbarui.');
}

public function newsDestroy(News $news)
{
    Storage::disk('public')->delete($news->image);
    $news->delete();
    return redirect()->back()->with('success', 'Berita berhasil dihapus!');
}

public function removeAdditionalImage(News $news, $index)
{
    $images = json_decode($news->additional_images) ?? [];
    if (isset($images[$index])) {
        Storage::disk('public')->delete($images[$index]);
        unset($images[$index]);
        $news->additional_images = json_encode(array_values($images));
        $news->save();
    }

    return back()->with('success', 'Gambar tambahan berhasil dihapus.');
}

public function ppdb()
{
    $students = Ppdb::orderBy('created_at', 'desc')->get();
    return view('admin.ppdb', compact('students'));
}

public function storePpdb(Request $request)
{
    $validated = $request->validate([
        'nisn' => 'required|unique:ppdb',
        'name' => 'required',
        'asal_sekolah' => 'required'
    ]);

    Ppdb::create($validated);
    return redirect()->back()->with('success', 'Data siswa berhasil ditambahkan!');
}

public function importPpdb(Request $request)
{
    try {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new PpdbImport, $request->file('file'));
        
        return redirect()->back()->with('success', 'Data berhasil diimpor!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}

    public function elibrary()
{
    $borrowRequests = BorrowRequest::with(['student', 'book'])->get();
    return view('admin.elibrary', compact('borrowRequests'));
    return "E-Library route is working!";
}


    public function prestasi()
{
    $prestasis = Prestasi::orderBy('created_at', 'desc')->get();

    // Debug data prestasi
    \Log::info('Data prestasi:', $prestasis->toArray());
    
    return view('admin.prestasiadmin', compact('prestasis'));
}

public function storePrestasiAdmin(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'content' => 'required|string',
        'writer_name' => 'required|string|max:255',
        'published_date' => 'required|date'
    ]);

    $imagePath = $request->file('image')->store('prestasi', 'public');

    Prestasi::create([
        'title' => $validated['title'],
        'image' => $imagePath,
        'content' => $validated['content'],
        'writer_name' => $validated['writer_name'],
        'day' => $request->day,
        'created_at' => $request->published_date
    ]);

    return redirect()->back()->with('success', 'Prestasi berhasil ditambahkan!');
}

public function prestasiUpdate(Request $request, Prestasi $prestasi)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'additional_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // tambahkan validasi
        'content' => 'required|string',
        'writer_name' => 'required|string|max:255',
        'published_date' => 'required|date'
    ]);

    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($prestasi->image);
        $imagePath = $request->file('image')->store('prestasi', 'public');
        $prestasi->image = $imagePath;
    }

    // Tambahkan penanganan additional_image
    if ($request->hasFile('additional_image')) {
        $additionalImagePath = $request->file('additional_image')->store('prestasi', 'public');
        $currentImages = json_decode($prestasi->additional_images) ?? [];
        $currentImages[] = $additionalImagePath;
        $prestasi->additional_images = json_encode($currentImages);
    }

    $prestasi->title = $validated['title'];
    $prestasi->content = $validated['content'];
    $prestasi->writer_name = $validated['writer_name'];
    $prestasi->day = $request->day;
    $prestasi->created_at = $request->published_date;
    $prestasi->save();

    return redirect()->back()->with('success', 'Prestasi berhasil diperbarui!');
}

public function removeImage(Prestasi $prestasi, $index)
{
    $additionalImages = json_decode($prestasi->additional_images) ?? [];
    
    if (isset($additionalImages[$index])) {
        Storage::disk('public')->delete($additionalImages[$index]);
        array_splice($additionalImages, $index, 1);
        $prestasi->additional_images = json_encode($additionalImages);
        $prestasi->save();
    }

    return redirect()->back()->with('success', 'Gambar berhasil dihapus!');
}

public function prestasiDestroy(Prestasi $prestasi)
{
    // Hapus gambar utama
    if ($prestasi->image) {
        Storage::disk('public')->delete($prestasi->image);
    }
    
    // Hapus gambar tambahan
    if ($prestasi->additional_images) {
        $additionalImages = json_decode($prestasi->additional_images) ?? [];
        foreach ($additionalImages as $image) {
            Storage::disk('public')->delete($image);
        }
    }

    $prestasi->delete();
    return redirect()->back()->with('success', 'Prestasi berhasil dihapus!');
}

// Menampilkan halaman guru di admin
public function guruIndex(Request $request)
{
    $page = $request->query('page', 1); // Default ke halaman 1
    $teachersPerPage = 8;

    $teachers = Teacher::all()->groupBy('subject');
    $paginatedTeachers = $teachers->slice(($page - 1) * $teachersPerPage, $teachersPerPage);

    return view('admin.guru', [
        'teachers' => $paginatedTeachers,
        'currentPage' => $page,
        'totalPages' => ceil($teachers->count() / $teachersPerPage),
    ]);
}

public function storeGuru(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'subject' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $data = [
        'name' => $validated['name'],
        'subject' => $validated['subject'],
        'email' => $validated['email'],
        'phone' => $validated['phone']
    ];

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('teachers', 'public');
    }

    Teacher::create($data);

    return redirect()->back()->with('success', 'Guru berhasil ditambahkan!');
}

public function updateGuru(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'subject' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $teacher = Teacher::findOrFail($id);
    
    $data = [
        'name' => $validated['name'],
        'subject' => $validated['subject'],
        'email' => $validated['email'],
        'phone' => $validated['phone']
    ];

    if ($request->hasFile('photo')) {
        // Delete old photo if exists
        if ($teacher->photo) {
            Storage::disk('public')->delete($teacher->photo);
        }
        $data['photo'] = $request->file('photo')->store('teachers', 'public');
    }

    $teacher->update($data);

    return redirect()->back()->with('success', 'Data guru berhasil diperbarui!');
}

public function deleteGuru($id)
{
    $teacher = Teacher::findOrFail($id);
    
    // Delete photo if exists
    if ($teacher->photo) {
        Storage::disk('public')->delete($teacher->photo);
    }
    
    $teacher->delete();

    return redirect()->back()->with('success', 'Guru berhasil dihapus!');
}

}