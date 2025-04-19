@extends('layouts.master')

@section('title')
Daftar Akun Baru - KataBuku
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

                <!-- Form Login -->
                 
                <div class="col-md-7 d-flex align-items-center" style="padding-left: 40px;">
                    
                    <div class="card-body px-4">
                        {{-- Alert --}}
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            <strong>Berhasil!</strong>  {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            <strong>Error!</strong>  {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                         {{-- ÷\ End Alert --}}
                         
                        <div class="logo d-flex align-items-center mb-4 justify-content-start">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo img-fluid" style="height: 40px; margin-right: 10px;">
                            <h1 class="sitename-auth mb-0">KATABUKU</h1>
                        </div>
                        <p class="login-card-description text-start">Masuk Akun Anda</p>
                        <form action="/auth/login" method="POST" class="" style="max-width: 75%;">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email">
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Kata Sandi">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Masuk</button>
                        </form>
                        <a href="#!" class="text-muted d-block text-start mt-3">Lupa Kata Sandi?</a>
                        <p class="text-start mt-2">Belum punya akun? <a href="/auth/register" class="text-decoration-none">Daftar Sekarang</a></p>
                        <nav class="login-card-footer-nav text-start mt-4">
                            <a href="#!" class="text-muted">Terms of use</a> &bull; <a href="#!" class="text-muted">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection