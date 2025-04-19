@extends('layouts.master')
@section('title')
Tambahkan Buku - KataBuku
@endsection

@section('content')
<section class="comment-form section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"> 


                <form action="/books" method="POST" enctype="multipart/form-data">
                    @csrf

                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo d-flex img-fluid justify-content-center mx-auto" style="height: 40px; margin-right: 10px;">
                    <h2 class="text-center fw-bold mt-3">TAMBAH BUKU</h2>
                    <p class="text-center mb-4">Silakan isi formulir berikut untuk menambahkan data buku ke dalam sistem.</p>
                    
                    <div class="row">
                        <div class="col form-group">
                            <input name="title" type="text" id="books" class="form-control" placeholder="Judul Buku*" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <select name="genres_id" id="" class="form-control">
                                <option value="">Pilih Genre</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <input name="stok" type="number" class="form-control" id="stok" placeholder="Stock">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <input type="file" class="form-control" id="image" name="image">
                            <p class="text-muted mt-2">*maksimal ukuran gambar yang diupload adalah 2 MB.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <textarea name="summary" class="form-control" placeholder="Ringkasan Buku*"></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('books.index') }}" class="btn btn-danger">BATAL</a>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section><!-- /Comment Form Section -->

@endsection