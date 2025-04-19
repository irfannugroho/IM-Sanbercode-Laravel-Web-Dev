@extends('layouts.master')
@section('title')
Tambah Genre - KataBuku
@endsection

@section('content')
<section class="comment-form section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"> 
                <form action="{{ route('genres.store') }}" method="POST">
                    @csrf

                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo d-flex img-fluid justify-content-center mx-auto" style="height: 40px; margin-right: 10px;">
                    <h2 class="text-center fw-bold mt-3">TAMBAH GENRE BUKU</h2>
                    <p class="text-center mb-4">Silakan isi formulir berikut untuk menambahkan genre baru ke dalam sistem.</p>
                    
                    <div class="row">
                        <div class="col form-group">
                            <input name="name" type="text" id="books" class="form-control" placeholder="Nama Genre*" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <textarea name="description" class="form-control" placeholder="Deskripsi"></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('genres.index') }}" class="btn btn-danger">BATAL</a>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection