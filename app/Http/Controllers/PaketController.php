<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'tipe' => 'required|in:online,offline',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string|max:255',
        ]);

        Paket::create($request->only(['nama', 'tipe', 'harga', 'deskripsi', 'kategori']));

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama' => 'required|string',
            'tipe' => 'required|in:online,offline',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string|max:255',
        ]);

        $paket->update($request->only(['nama', 'tipe', 'harga', 'deskripsi', 'kategori']));

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }

    // Menampilkan semua paket offline
    public function showOffline()
    {
        $pakets = Paket::where('tipe', 'offline')->get();
        return view('paket.paket-offline', compact('pakets'));
    }

    // Menampilkan semua paket online
    public function showOnline()
    {
        $pakets = Paket::where('tipe', 'online')->get();
        return view('paket.paket-online', compact('pakets'));
    }
}
