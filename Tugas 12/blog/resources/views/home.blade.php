@extends('layouts.home')
@section('title')
Beranda - KataBuku
@endsection
@section('content')

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

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="portfolio section">
            <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Selamat Datang di KATABUKU</h2>
      </div><!-- End Section Title -->


            <div class="container">
                <div class="row align-items-center" style="height: auto;">
                    <!-- Kolom Kiri (Carousel) -->
                    <div class="col-lg-8 col-md-12 mb-4">
                        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/jumbotron1.jpg') }}" class="d-block w-100" alt="Promo 1">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Pentingnya Literasi</h5>
                                        <p>Budayakan literasi sedini mungkin pada generasi penerus kita.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/jumbotron2.jpg') }}" class="d-block w-100" alt="Promo 2">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Koleksi Musim Ini</h5>
                                        <p>Temukan tren terbaru dengan koleksi eksklusif kami.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/jumbotron3.jpg') }}" class="d-block w-100" alt="Promo 3">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Memperingati Hari Kartini</h5>
                                        <p>Mari membaca buku sejarah untuk mengenang jasa-jasa pahlawan</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <!-- Kolom Kanan (Gambar Tambahan) -->
                    <div class="col-lg-4 col-md-12">
                        <div class="row mb-3">
                            <div class="col mb-1">
                                <img src="{{ asset('images/sidebar1.jpg') }}" alt="Gambar 1" class="img-fluid rounded" style="height: 190px; width: 100%; object-fit: cover;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('images/sidebar2.png') }}" alt="Gambar 2" class="img-fluid rounded" style="height: 190px; width: 100%; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- /Hero Section -->


    <!-- Buku Favorit Section -->
<section id="favorite-books" class="favorite-books section" >
  <div class="container">
      <!-- Section Title -->
      <div class="section-title" data-aos="fade-up">
          <h2>Bacaan Favorit Pekan Ini!</h2>
          <div class=" col">
            <p>Buku yang sering dibicarakan akhir-akhir ini.</p><a href="/genres">Lihat Selengkapnya</a>
          </div>
      </div>

      <!-- Carousel -->
      <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
              @foreach ($books->chunk(5) as $chunkIndex => $chunk)
              <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                  <div class="row gx-4 gy-4">
                      @foreach ($chunk as $book)
                      <div class="col-md-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                          <div class="card h-100">
                              <img src="{{ asset('images/' . $book->image) }}" class="card-img-top mb-10" alt="{{ $book->title }}">
                              <div class="card-body text-center">
                                  <h5 class="card-title">{{ $book->title }}</h5>
                                  <a href="{{ route('books.show', $book->id) }}" class="readmore stretched-link"><span>Baca</span><i class="bi bi-arrow-right"></i></a>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
              </div>
              @endforeach
          </div>

          <!-- Carousel Controls -->
        
          <button class="custom-carousel-next" type="button" data-bs-target="#bookCarousel" data-bs-slide="next">
            <i class="bi bi-arrow-right-circle-fill"></i>
            <span class="visually-hidden">Next</span>
        </button>
  </div>
</section>

<!-- Genre Section -->
<section id="features" class="features section">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title mb-5" data-aos="fade-up">
            <h2>Genre Paling Menarik </h2>
            <div class=" col">
              <p>Beragam genre sesuai dengan favorite Anda.</p><a href="/genres">Lihat Selengkapnya</a>
            </div>
        </div>

        <div class="row gy-4">
            @foreach ($genres->take(10) as $genre)
            <div class="col-lg-2 col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="features-item d-flex justify-content-between align-items-center hover-container">
                    <h3 class="text-center flex-grow-1">
                        <a href="/genres/{{ $genre->id }}" class="stretched-link content-center">{{ $genre['name'] }}</a>
                    </h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="page-title endbar">
    <div class="container d-lg-flex justify-content-between align-items-center">
        
      <h1 class="mb-2 mb-lg-0">Katabuku</h1>
      
        <p class="fw-bold">Satu ruang seru untuk berbagi pengalaman membaca, menulis review, dan menemukan buku-buku terbaik versi pembaca lain!</p>
      
    </div>
  </div><!-- End Page Title -->

  </main>
@endsection