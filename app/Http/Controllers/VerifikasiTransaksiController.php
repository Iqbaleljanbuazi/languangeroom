<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class VerifikasiTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaction::where('status', 'pending')->get();
        return view('admin.verifikasi', compact('transaksis'));
    }

    public function verifikasi($id)
    {
        $transaksi = Transaction::findOrFail($id);
        $transaksi->status = 'success';
        $transaksi->save();

        return redirect()->route('admin.verifikasi')->with('success', 'Transaksi berhasil diverifikasi!');
    }
} 