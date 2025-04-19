@extends('layouts.master')
@section('title')
Edit Buku - KataBuku
@endsection

@section('content')

  
  <script>
    function confirmDelete() {
      if (confirm('Are you sure you want to delete this book?')) {
        document.getElementById('delete-form').submit();
      }
    }
    </script>
  <!-- Blog Button Section End -->

<section class="comment-form section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"> 
                <form action="/books/{{ $books->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <h4 class="text-center">Edit Buku</h4>
                    <p class="text-muted text-center">*biarkan image kosong jika tidak ingin mengubah gambar</p>

                    <p class="text-center"></p>
                    
                    <div class="row">
                        <div class="col form-group">
                            <input name="title" type="text" id="books" class="form-control" 
                                   placeholder="Books Title*" 
                                   value="{{ old('title', $books->title) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <select name="genres_id" id="" class="form-control">
                                <option value="">Select Genre</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" 
                                        {{ old('genres_id', $books->genres_id) == $genre->id ? 'selected' : '' }}>
                                    {{ $genre->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <input name="stok" type="number" class="form-control" id="stok" 
                                   placeholder="Stock" 
                                   value="{{ old('stok', $books->stok) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <input type="file" class="form-control" id="image" name="image">
                            @if ($books->image)
                            <div class="mt-3">
                                <p>Gambar Sebelumnya:</p>
                                <img src="{{ asset('images/' . $books->image) }}" alt="Previous Image" class="img-fluid" >
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <textarea name="summary" class="form-control" placeholder="Summary*">{{ old('summary', $books->summary) }}</textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href={{ route('books.index') }} class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section><!-- /Comment Form Section -->

@endsection