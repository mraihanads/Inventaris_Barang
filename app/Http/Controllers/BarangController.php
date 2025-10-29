<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\LokasiBarang;
use App\Models\PerolehanBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with(['lokasi', 'perolehan'])->latest()->get();
        return view('admin.barang.index', compact('barang'));
    }

    public function create()
    {
        $lokasi = LokasiBarang::orderBy('nama')->get();
        $perolehan = PerolehanBarang::orderBy('nama')->get();
        return view('admin.barang.create', compact('lokasi', 'perolehan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang',
            'nama' => 'required|string|max:255',
            'lokasi_barang_id' => 'nullable|exists:lokasi_barang,id',
            'perolehan_barang_id' => 'nullable|exists:perolehan_barang,id',
            'harga' => 'required|numeric|min:0',
            'tahun_perolehan' => 'required|integer|min:1900|max:' . date('Y'),
            'kondisi' => 'required|string|max:100',
            'catatan' => 'nullable|string|max:255',
        ]);

        Barang::create($validated);

        return redirect()->route('barang.index')->with('success', '✅ Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $barang = Barang::with(['lokasi', 'perolehan'])->findOrFail($id);
        return view('admin.barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $lokasi = LokasiBarang::orderBy('nama')->get();
        $perolehan = PerolehanBarang::orderBy('nama')->get();
        return view('admin.barang.edit', compact('barang', 'lokasi', 'perolehan'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang,' . $barang->id,
            'nama' => 'required|string|max:255',
            'lokasi_barang_id' => 'nullable|exists:lokasi_barang,id',
            'perolehan_barang_id' => 'nullable|exists:perolehan_barang,id',
            'harga' => 'required|numeric|min:0',
            'tahun_perolehan' => 'required|integer|min:1900|max:' . date('Y'),
            'kondisi' => 'required|string|max:100',
            'catatan' => 'nullable|string|max:255',
        ]);

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', '✅ Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', '🗑️ Barang berhasil dihapus.');
    }
}
