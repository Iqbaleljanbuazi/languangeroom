<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Transaction;

class MateriController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $trx = Transaction::where('user_id', $user->id)
            ->where('status', 'success')
            ->latest()
            ->first();

        $paket = null;
        $videos = [];

        if ($trx && $trx->paket) {
            $paket = strtolower($trx->paket->kategori);
            $videos = Video::where('jenjang', $paket)->get();
        }

        return view('materi.index', compact('paket', 'videos'));
    }
}