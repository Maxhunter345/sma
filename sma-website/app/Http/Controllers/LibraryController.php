<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Library::orderBy('created_at', 'desc')->get();
        return view('library.index', compact('books'));
    }

    public function show($id)
    {
        $book = Library::findOrFail($id);
        return view('library.show', compact('book'));
    }

    public function adminIndex()
    {
        $books = Library::orderBy('created_at', 'desc')->get();
        return view('admin.library', compact('books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'file_pdf' => 'required|mimes:pdf|max:10240', // Max 10MB
        ]);

        $coverPath = $request->file('cover_image')->store('book-covers', 'public');
        $pdfPath = $request->file('file_pdf')->store('books', 'public');

        Library::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'cover_image' => $coverPath,
            'file_path' => $pdfPath,
        ]);

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan');
    }

    public function update(Request $request, Library $library)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($library->cover_image);
            $coverPath = $request->file('cover_image')->store('book-covers', 'public');
            $library->cover_image = $coverPath;
        }

        if ($request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($library->file_path);
            $pdfPath = $request->file('file_pdf')->store('books', 'public');
            $library->file_path = $pdfPath;
        }

        $library->update([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'description' => $validated['description'],
            'category' => $validated['category'],
        ]);

        return redirect()->back()->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Library $library)
    {
        Storage::disk('public')->delete($library->cover_image);
        Storage::disk('public')->delete($library->file_path);
        $library->delete();
        
        return response()->json(['success' => true]);
    }
}