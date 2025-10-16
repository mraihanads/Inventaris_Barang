<?php

namespace App\Http\Controllers;

use App\Models\LokasiBarang;
use Illuminate\Http\Request;

class LokasiBarangController extends Controller
{
    /**
     * 🔹 Halaman publik - daftar semua ruangan
     */
    public function publicIndex()
    {
        $lokasi = LokasiBarang::orderBy('nama')->get();
        return view('pagehome.ruangan', compact('lokasi'));
    }

    public function showBarang($id)
    {
    // Ambil data lokasi beserta barang-barangnya
    $lokasi = \App\Models\LokasiBarang::with('barang')->findOrFail($id);

    // Kirim ke view baru 'pagehome.barang'
    return view('pagehome.barang', compact('lokasi'));
    }


    /**
     * 🔹 CRUD (Admin) - Daftar semua lokasi
     */
    public function index()
    {
        $lokasi = LokasiBarang::all();
        return view('admin.lokasi.index', compact('lokasi'));
    }

    /**
     * 🔹 Tampilkan form tambah lokasi
     */
    public function create()
    {
        return view('admin.lokasi.create');
    }

    /**
     * 🔹 Simpan data lokasi baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        LokasiBarang::create($validated);

        return redirect()
            ->route('lokasi.index')
            ->with('success', '✅ Lokasi berhasil ditambahkan.');
    }

    /**
     * 🔹 Tampilkan form edit lokasi
     */
    public function edit($id)
    {
        $lokasi = LokasiBarang::findOrFail($id);
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    /**
     * 🔹 Update data lokasi
     */
    public function update(Request $request, $id)
    {
        $lokasi = LokasiBarang::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $lokasi->update($validated);

        return redirect()
            ->route('lokasi.index')
            ->with('success', '✅ Lokasi berhasil diperbarui.');
    }

    /**
     * 🔹 Hapus lokasi
     */
    public function destroy($id)
    {
        $lokasi = LokasiBarang::findOrFail($id);
        $lokasi->delete();

        return redirect()
            ->route('lokasi.index')
            ->with('success', '🗑️ Lokasi berhasil dihapus.');
    }
}
