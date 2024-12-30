<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PpdbImport;

class PpdbController extends Controller
{
    public function index()
    {
        return view('ppdb');
    }

    public function check(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string'
        ]);

        $student = Ppdb::where('nisn', $request->nisn)->first();
        
        return view('ppdb', [
            'result' => true,
            'accepted' => !is_null($student),
            'student' => $student, // Tambahkan ini untuk mengirim data siswa ke view
            'nisn' => $request->nisn // Tambahkan ini untuk mempertahankan input NISN
        ]);
    }

    public function adminIndex()
    {
        $students = Ppdb::all();
        return view('admin.ppdb', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|string|unique:ppdb',
            'name' => 'required|string',
            'asal_sekolah' => 'required|string'
        ]);

        Ppdb::create($validated);

        return redirect()->back()->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            Excel::import(new PpdbImport, $request->file('file'));
            return redirect()->back()->with('success', 'Data berhasil diimpor');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengimpor data: ' . $e->getMessage());
        }
    }

    public function destroy(Ppdb $ppdb)
    {
        try {
            $ppdb->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}