@extends('layouts.master')

@section('title')
Daftar Akun - KataBuku
@endsection

@section('content')

<main class="d-flex align-items-center max-vh-150 py-3 py-md-0">

    <div class="container">
        <div class="card login-card shadow-lg border-0 mx-auto" style="max-width: 1000px;">
            <div class="row g-0">
                <!-- Gambar Samping -->
                <div class="col-md-5">
                    <img src="{{ asset('images/auth.png') }}" alt="login" class="login-card-img img-fluid w-100 h-100" style="object-fit: cover; border-top-left-radius: 0.5rem; border-bottom-left-radius: 0.5rem;">
                </div>

                <!-- Form Register -->
                <div class="col-md-7 d-flex align-items-center max-vh-100" style="padding-left: 40px;">
                    <div class="card-body px-4">
                        
                        {{-- Alert --}}
                        
                        @if ($errors->has('error'))
                            <div class="alert d-flex mt-0 alert-danger" style="max-width: 75%;">
                                {{ $errors->first('error') }}
                            </div>
                        @endif
                         {{-- ÷\ End Alert --}}

                        <div class="logo d-flex align-items-center mb-4 justify-content-start">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo img-fluid" style="height: 40px; margin-right: 10px;">
                            <h1 class="sitename-auth mb-0">KATABUKU</h1>
                        </div>
                        <p class="login-card-description text-start">Daftar Akun Baru</p>
                        <form action="/auth/register" method="POST" class="" style="max-width: 75%;">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama">
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Kata Sandi">
                            </div>
                            <div class="mb-1">
                                <input type="password" name="password_confirmation" id="confirm-password" class="form-control" placeholder="Konfirmasi Kata Sandi">
                            </div>
                            <p class="text-muted d-block text-start mt-0">*  Kata sandi minimal 8 karakter</p>
                            <div class="form-check mt-0">
                                <input type="checkbox" name="confirm" id="confirm" class="form-check-input">
                                <label for="confirm" class="form-check-label text-muted">
                                    Dengan mendaftar, Anda menyetujui <a href="#!" class="text-muted">Ketentuan Penggunaan</a> dan <a href="#!" class="text-muted">Kebijakan Privasi</a>.
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success mt-2 w-100">Daftar</button>
                        </form>
                        
                        <p class="text-start mt-4">Sudah punya akun? <a href="/auth/login" class="text-decoration-none">Masuk</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection