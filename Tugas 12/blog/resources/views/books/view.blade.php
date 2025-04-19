@extends('layouts.master')
@section('title')
Koleksi Buku - KataBuku
@endsection

@section('content')

<body>
    <div class="container ">
        <div class="blog-jumbotron">
            <div class="row ">
                <div class="col-md-7 align-items-center">
                    <h2 class="fw-bold mb-2 text-white">TEMUKAN BERBAGAI BUKU BACAAN YANG MUNGKIN SEDANG ANDA CARI, DISINI!</h2>
                    <p class="fw-bold text-white">Jelajahi koleksi kami dan pilih bacaan yang sesuai dengan minat serta preferensi Anda.</p>
                </div>
            </div>
            <img src="{{ asset('images/genres-jumbotron.png') }}" alt="Reading Girl" class="jumbotron-blog-image d-none d-md-block">
        </div>

        <!-- Tombol "Edit Book" -->
        @auth
        @if (Auth()->user()->role == 'admin')
        <div class="justify-content-end">
            <button id="toggle-edit-btn" class="btn btn-primary">Edit Book</button>
        </div>
        @endif
        @endauth
    </div>

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

        <div class="container">
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 ">
            @foreach ($books as $book)
            <div class="col">
              <article class="position-relative h-100">

                {{-- Button Edit/Delete --}}
                <div class="card-blok" id="edit-buttons-{{ $book->id }}" style="display: none;">
                  <ul class="close-btn list-unstyled d-flex align-items-center m-0 p-0" style="gap: 10px;">
                      <li>
                          <a href="{{ route('books.edit', $book->id) }}" class="icon-btn">
                              <i class="bi bi-pencil-fill fs-4"></i>
                          </a>
                      </li>
                      <li>
                          <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                          </form>
                          <a href="#" onclick="confirmDelete('delete-form-{{ $book->id }}'); event.preventDefault();" class="icon-btn">
                            <i class="bi bi-trash-fill fs-3"></i>
                        </a>
                      </li>
                  </ul>
              </div>

                {{-- Button Edit/Delete End --}}

                <div class="post-img position-relative overflow-hidden">
                  <img src="{{ asset('images/' . $book->image) }}" class="img-fluid" alt="{{ $book->title }}">
                 
                </div>
  
                <div class="post-content d-flex flex-column">
  
                  <h3 class="post-title">{{ $book->title }}</h3>
  
                  <div class="meta d-flex align-items-center justify-content-center" >
                  
                    <div class="d-flex align-items-center">
                      <i class="bi bi-tags-fill"></i> <span class="ps-2 ">{{ $book->genre->name ?? 'No Genre' }}</span>
                    </div>
                  </div>
  
                  <p>
                    {{ Str::limit($book->summary, 100) }}
                  </p>
  
                  <hr>
  
                  <a href="{{ route('books.show', $book->id) }}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
  
                </div>
  
              </article>
            </div><!-- End post list item -->

          
            @endforeach

            @auth
              
            @if (Auth()->user()->role == 'admin')
              
            
            
            <div class="row-col-lg-4">
            <article class="position-relative h-100">

              <div class="post-img position-relative overflow-hidden text-center mt-6">
                <img src="{{ asset('images/uploadimg.png') }}" class="img-fluid text-center mt-6" alt="upload" style="height: 75%; width: 75%; object-fit: contain;">
              </div>

              <div class="post-content d-flex flex-column">

                <h3 class="post-title">Tambahkan Review Buku Baru</h3>

                <p>
                  Klik untuk menambahkan review untuk buku yang sudah ada atau menambahkan buku baru ke dalam daftar.
                </p>

                <hr>

                <a href="/books/create" class="readmore stretched-link"><span>Tambahkan Sekarang</span><i class="bi bi-arrow-right"></i></a>

              </div>

            </article>
            </div>
            @endif
            @endauth
          </div><!-- End add list item -->
            
  
          </div>
        </div>
  
      </section><!-- /Blog Posts Section -->
  
      <!-- Blog Pagination Section -->
      <section id="blog-pagination" class="blog-pagination section">
  
        <div class="container">
          <div class="d-flex justify-content-center">
            <ul>
              <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
              <li><a href="#" class="active">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li>...</li>
              <li><a href="#">10</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
  
      </section>
      <!-- /Blog Pagination Section -->

    

      <script>
        document.getElementById('toggle-edit-btn').addEventListener('click', function () {
            // Ambil semua elemen dengan ID yang dimulai dengan "edit-buttons-"
            const editButtons = document.querySelectorAll('[id^="edit-buttons-"]');
            editButtons.forEach(button => {
                // Toggle visibilitas elemen
                if (button.style.display === 'none') {
                    button.style.display = 'block';
                } else {
                    button.style.display = 'none';
                }
            });
        });


        function confirmDelete(formId) {
        if (confirm('Apakah Anda yakin ingin menghapus buku ini?')) {
            document.getElementById(formId).submit();
        }
    }
    </script>
        
</body>

@endsection