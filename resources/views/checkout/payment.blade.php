@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h2>Memproses Pembayaran...</h2>
    <p>Silakan tunggu, Anda akan diarahkan ke halaman pembayaran Midtrans.</p>
</div>

<script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ $clientKey }}">
</script>

<script type="text/javascript">
    window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
            // Redirect ke halaman media pembelajaran setelah berhasil
            window.location.href = "/materi";
        },
        onPending: function(result) {
            alert("Pembayaran sedang diproses.");
            console.log(result);
        },
        onError: function(result) {
            alert("Pembayaran gagal.");
            console.log(result);
        },
        onClose: function() {
            alert("Anda menutup pop-up tanpa menyelesaikan pembayaran.");
        }
    });
</script>

@endsection
