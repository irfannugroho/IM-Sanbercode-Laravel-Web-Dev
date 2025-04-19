@extends('layouts.master')
@section('title')
Edit Genre - {{$genres->name}} - KataBuku
@endsection
@section('content')


<section class="comment-form section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"> 
                <form action="/genres/{{$genres->id}}" method="POST">
                    @csrf
                    @method('PUT')

                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo d-flex img-fluid justify-content-center mx-auto" style="height: 40px; margin-right: 10px;">
                    <h2 class="text-center fw-bold mt-3">EDIT GENRE BUKU</h2>
                    <p class="text-center mb-4">Silakan isi formulir berikut untuk mengedit, simpan untuk merubah dan batal untuk kembali</p>
                    
                    <div class="row">
                        <div class="col form-group">
                            <input name="name" type="text" id="books" class="form-control" value="{{ $genres->name }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            <textarea name="description" class="form-control" placeholder="Deskripsi">{{ old('description', $genres->description) }}<</textarea>
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
@endsection
