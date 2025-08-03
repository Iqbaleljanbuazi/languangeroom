@extends('layouts.app')
@section('content')
<div class="container mt-5" style="max-width:400px">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="mb-4 text-center">Login</h3>
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="mt-3 text-center">
                Belum punya akun? <a href="{{ url('/register') }}">Register</a>
            </div>
        </div>
    </div>
</div>
@endsection 