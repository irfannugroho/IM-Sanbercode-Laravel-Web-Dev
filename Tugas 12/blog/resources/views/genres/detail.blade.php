@extends('layouts.master')
@section('title')
Genre - {{$genres->name}} - KataBuku
@endsection
@section('content')

<div class="col col-md-6 align-items-center widgets-container mx-auto genre-detail section">

    <!-- Genres Title -->
    <div class="bg-c-lite-green genre-box">

      <div class="d-flex flex-column align-items-center">
        <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="" >
        <h1 class="fw-bold text-white" style="text-transform: uppercase;">{{ $genres->name }}</h1>

        <p class="text-white">
            {{ $genres->description }}
        </p>

      </div>
       {{-- Button Edit/Delete --}}
    <div class="card-blok">
      <ul class="list-unstyled d-flex justify-content-center mx-auto m-0 p-0" style="gap: 10px;">
          <li>
              <a href="{{ route('genres.index') }}" class="icon-btn">
                  <i class="bi bi-arrow-left-circle-fill fs-4"></i>
              </a>
          </li>
          <li>
              <a href="{{ route('genres.edit', $genres->id) }}" class="icon-btn">
                  <i class="bi bi-pencil-fill fs-4"></i>
              </a>
          </li>
          <li>
              <form id="delete-form-{{ $genres->id }}" action="{{ route('genres.destroy', $genres->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
              </form>
              <a href="#" onclick="confirmDelete({{ $genres->id }}); event.preventDefault();" class="icon-btn">
                <i class="bi bi-trash-fill fs-3"></i>
            </a>
          </li>
      </ul>
  </div>

  <script>
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus profil ini?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>

    </div>

   


    <!-- Buku terkait  -->
    <div class="recent-posts-widget widget-item">

      <h3 class="widget-title">Buku terkait : </h3>

      <div class="post-item">
        @foreach ($books as $book)
        <h4>
            <a href="{{ route('books.show', $book->id) }}">
                {{ $book->title }}
            </a>
        </h4>
        <time datetime="{{ $book->updated_at }}">{{ $book->updated_at }}</time>
        @endforeach
    </div><!-- End Buku Terkait-->

      

    </div>
  

  </div>

@endsection
