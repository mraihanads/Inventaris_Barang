<?php

namespace App\Http\Controllers;

use App\Models\PerolehanBarang;
use Illuminate\Http\Request;

class PerolehanBarangController extends Controller
{
    /**
     * Tampilkan semua data perolehan.
     */
    public function index()
    {
        $perolehan = PerolehanBarang::latest()->get();
        return view('admin.perolehan.index', compact('perolehan'));
    }

    /**
     * Tampilkan form tambah perolehan.
     */
    public function create()
    {
        return view('admin.perolehan.create');
    }

    /**
     * Simpan data perolehan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'keterangan' => 'nullable|string|max:255',
        ]);

        PerolehanBarang::create($validated);

        return redirect()->route('perolehan.index')
            ->with('success', '✅ Data perolehan berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail perolehan.
     */
    public function show($id)
    {
        $perolehan = PerolehanBarang::findOrFail($id);
        return view('admin.perolehan.show', compact('perolehan'));
    }

    /**
     * Form edit data perolehan.
     */
    public function edit($id)
    {
        $perolehan = PerolehanBarang::findOrFail($id);
        return view('admin.perolehan.edit', compact('perolehan'));
    }

    /**
     * Update data perolehan.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $perolehan = PerolehanBarang::findOrFail($id);
        $perolehan->update($validated);

        return redirect()->route('perolehan.index')
            ->with('success', '✅ Data perolehan berhasil diperbarui.');
    }

    /**
     * Hapus data perolehan.
     */
    public function destroy($id)
    {
        $perolehan = PerolehanBarang::findOrFail($id);
        $perolehan->delete();

        return redirect()->route('perolehan.index')
            ->with('success', '🗑️ Data perolehan berhasil dihapus.');
    }
}
