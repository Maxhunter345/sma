<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\News;
use App\Models\Ppdb;
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
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'content' => 'required|string'
    ]);

    $imagePath = $request->file('image')->store('news', 'public');

    News::create([
        'title' => $validated['title'],
        'image' => $imagePath,
        'content' => $validated['content']
    ]);

    return redirect()->back()->with('success', 'Berita berhasil ditambahkan!');
}

public function newsUpdate(Request $request, News $news)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'content' => 'required|string'
    ]);

    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($news->image);
        $imagePath = $request->file('image')->store('news', 'public');
        $news->image = $imagePath;
    }

    $news->title = $validated['title'];
    $news->content = $validated['content'];
    $news->save();

    return redirect()->back()->with('success', 'Berita berhasil diperbarui!');
}

public function newsDestroy(News $news)
{
    Storage::disk('public')->delete($news->image);
    $news->delete();
    return redirect()->back()->with('success', 'Berita berhasil dihapus!');
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
        return view('admin.elibrary');
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
        'content' => 'required|string'
    ]);

    $imagePath = $request->file('image')->store('prestasi', 'public');

    Prestasi::create([
        'title' => $validated['title'],
        'image' => $imagePath,
        'content' => $validated['content']
    ]);

    return redirect()->back()->with('success', 'Prestasi berhasil ditambahkan!');
}

public function prestasiUpdate(Request $request, Prestasi $prestasi)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'content' => 'required|string'
    ]);

    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($prestasi->image);
        $imagePath = $request->file('image')->store('prestasi', 'public');
        $prestasi->image = $imagePath;
    }

    $prestasi->title = $validated['title'];
    $prestasi->content = $validated['content'];
    $prestasi->save();

    return redirect()->back()->with('success', 'Prestasi berhasil diperbarui!');
}

public function prestasiDestroy(Prestasi $prestasi)
{
    Storage::disk('public')->delete($prestasi->image);
    $prestasi->delete();
    return redirect()->back()->with('success', 'Prestasi berhasil dihapus!');
}

}