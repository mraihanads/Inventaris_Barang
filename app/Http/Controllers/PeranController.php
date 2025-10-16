<?php

namespace App\Http\Controllers;

use App\Models\Peran;
use Illuminate\Http\Request;

class PeranController extends Controller
{
    public function index()
    {
        $peran = Peran::latest()->get();
        return view('admin.peran.index', compact('peran'));
    }

    public function create()
    {
        return view('admin.peran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100|unique:peran,nama',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Peran::create($validated);

        return redirect()->route('peran.index')
            ->with('success', '👤 Peran baru berhasil ditambahkan.');
    }

    public function show($id)
    {
        $peran = Peran::findOrFail($id);
        return view('admin.peran.show', compact('peran'));
    }

    public function edit($id)
    {
        $peran = Peran::findOrFail($id);
        return view('admin.peran.edit', compact('peran'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100|unique:peran,nama,' . $id,
            'keterangan' => 'nullable|string|max:255',
        ]);

        $peran = Peran::findOrFail($id);
        $peran->update($validated);

        return redirect()->route('peran.index')
            ->with('success', '✅ Data peran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peran = Peran::findOrFail($id);
        $peran->delete();

        return redirect()->route('peran.index')
            ->with('success', '🗑️ Data peran berhasil dihapus.');
    }
}
