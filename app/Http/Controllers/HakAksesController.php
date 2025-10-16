<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function index()
    {
        $hak = HakAkses::latest()->get();
        return view('admin.hak.index', compact('hak'));
    }

    public function create()
    {
        return view('admin.hak.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        HakAkses::create($validated);

        return redirect()->route('hak.index')
            ->with('success', '🔑 Hak akses baru berhasil ditambahkan.');
    }

    public function show($id)
    {
        $hak = HakAkses::findOrFail($id);
        return view('admin.hak.show', compact('hak'));
    }

    public function edit($id)
    {
        $hak = HakAkses::findOrFail($id);
        return view('admin.hak.edit', compact('hak'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $hak = HakAkses::findOrFail($id);
        $hak->update($validated);

        return redirect()->route('hak.index')
            ->with('success', '✅ Hak akses berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $hak = HakAkses::findOrFail($id);
        $hak->delete();

        return redirect()->route('hak.index')
            ->with('success', '🗑️ Hak akses berhasil dihapus.');
    }
}
