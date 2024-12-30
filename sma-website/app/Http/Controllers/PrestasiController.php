<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
   public function index()
   {
       $prestasis = Prestasi::orderBy('created_at', 'desc')->get();
       return view('prestasi', compact('prestasis'));
   }

   public function prestasiIndex()
   {
       $prestasis = Prestasi::orderBy('created_at', 'desc')->get();
       return view('admin.prestasiadmin', compact('prestasis'));
   }

   public function prestasiStore(Request $request) 
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