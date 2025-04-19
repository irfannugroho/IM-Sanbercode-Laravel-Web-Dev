@extends('layouts.master')
@section('title')
Genre - KataBuku
@endsection

@section('content')


<!-- Section Title -->
<div class="container blog-jumbotron">
    <div class="row ">
        <div class="col-md-7 align-items-center">
            <h2 class="fw-bold mb-2 text-white">TEMUKAN BUKU SESUAI DENGAN GENRE FAVORITMU!</h2>
            <p class="fw-bold text-white">Temukan koleksi buku terbaik dari berbagai genre — mulai dari romansa, komedi, hingga fantasi. Pilih sesuai selera dan nikmati pengalaman membaca yang seru!</p>
        </div>
    </div>
    <img src="{{ asset('images/genres-jumbotron.png') }}" alt="Reading Girl" class="jumbotron-blog-image d-none d-md-block">
</div>

<section id="features" class="features section container">
    <div class="container">

        <div class="row gy-4">
            @foreach ($genres as $genre)
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="features-item d-flex justify-content-between align-items-center hover-container">
                    <h3 class="text-center flex-grow-1">
                        <a href="/genres/{{ $genre->id }}" class="stretched-link content-center">{{ $genre->name }}</a>
                    </h3>
                    <i class="bi bi-eye icon-hidden"></i>
                </div>
            </div>
            @endforeach
        

            @auth
            @if (Auth::user()->role === 'admin')
            
            
            
            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="features-item d-flex justify-content-between align-items-center">
                    <h3 class="text-center flex-grow-1"><a href="{{ route('genres.create') }}" class="stretched-link content-center">Tambah</a></h3>
                    <i class="bi bi-plus-circle"></i>
                </div>
            </div>
            
            @endif
            @endauth
          </div>

    </div>

</section>
@endsection