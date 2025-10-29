<?php

namespace App\Http\Controllers;

use App\Models\PerolehanBarang;
use Illuminate\Http\Request;

class PerolehanBarangController extends Controller
{
    /**
     * Menampilkan semua data perolehan.
     */
    public function index()
    {
        $perolehan = PerolehanBarang::latest()->get();
        return view('admin.perolehan.index', compact('perolehan'));
    }

    /**
     * Menampilkan form untuk menambah data baru.
     */
    public function create()
    {
        return view('admin.perolehan.create');
    }

    /**
     * Menyimpan data perolehan baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255', // ✅ ubah dari 'keterangan' ke 'deskripsi'
        ]);

        PerolehanBarang::create($validated);

        return redirect()->route('perolehan.index')
            ->with('success', '✅ Data perolehan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail dari satu data perolehan.
     */
    public function show($id)
    {
        $perolehan = PerolehanBarang::findOrFail($id);
        return view('admin.perolehan.show', compact('perolehan'));
    }

    /**
     * Menampilkan form edit data perolehan.
     */
    public function edit($id)
    {
        $perolehan = PerolehanBarang::findOrFail($id);
        return view('admin.perolehan.edit', compact('perolehan'));
    }

    /**
     * Mengupdate data perolehan yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $perolehan = PerolehanBarang::findOrFail($id);
        $perolehan->update($validated);

        return redirect()->route('perolehan.index')
            ->with('success', '✅ Data perolehan berhasil diperbarui.');
    }

    /**
     * Menghapus data perolehan.
     */
    public function destroy($id)
    {
        $perolehan = PerolehanBarang::findOrFail($id);
        $perolehan->delete();

        return redirect()->route('perolehan.index')
            ->with('success', '🗑️ Data perolehan berhasil dihapus.');
    }
}
