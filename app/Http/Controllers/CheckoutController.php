<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Paket;
use App\Models\Transaction;
use Midtrans\Snap;
use App\Models\Transaksi;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function form(Request $request)
    {
        $paketTerpilih = null;

        if ($request->has('paket_id')) {
            $paketTerpilih = Paket::find($request->paket_id);
        }

        $pakets = Paket::all();

        return view('checkout.form', compact('pakets', 'paketTerpilih'));
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|min:10',
            'paket_id' => 'required|exists:pakets,id',
        ]);

        $paket = Paket::find($request->paket_id);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Buat Order ID unik
        $orderId = 'ORDER-' . uniqid();

        // Simpan transaksi ke database dengan status pending
        Transaction::create([
            'user_id' => Auth::id(),
            'paket_id' => $paket->id,
            'order_id' => $orderId,
            'status' => 'pending',
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $paket->harga,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => $request->phone,
            ],
            'item_details' => [
                [
                    'id' => 'paket-' . $paket->id,
                    'price' => $paket->harga,
                    'quantity' => 1,
                    'name' => $paket->tipe . ' ' . $paket->kategori,
                ]
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('checkout.payment', [
            'snapToken' => $snapToken,
            'clientKey' => env('MIDTRANS_CLIENT_KEY'),
        ]);
    }

    // Hapus fungsi midtransCallback
    // public function midtransCallback(Request $request)
    // {
    //     // Ambil notifikasi dari Midtrans
    //     $notif = new \Midtrans\Notification();
    //
    //     $transaction = $notif->transaction_status;
    //     $order_id = $notif->order_id;
    //
    //     $transaksi = \App\Models\Transaction::where('order_id', $order_id)->first();
    //     if ($transaksi) {
    //         if ($transaction == 'settlement' || $transaction == 'capture') {
    //             $transaksi->status = 'success';
    //         } elseif ($transaction == 'pending') {
    //             $transaksi->status = 'pending';
    //         } else {
    //             $transaksi->status = 'failed';
    //         }
    //         $transaksi->save();
    //     }
    //     return response()->json(['message' => 'Notification handled']);
    // }
}
