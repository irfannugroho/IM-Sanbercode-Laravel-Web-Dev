@extends('layouts.master')
@section('title')
{{ $users->name }} - Profile - KataBuku
@endsection

@section('content')

<div class="page-content container page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card user-card-full position-relative">
                    <a href="/" class="position-absolute top-0 end-0 m-3" style="text-decoration: none;">
                        <i class="bi bi-x-square fs-2 text-danger"></i>
                    </a>
                    <div class="row m-l-0 m-r-0">
                        <div class="col-md-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h1 class="f-w-600 text-white">{{ $users->name }}</h1>
                                <h5 class="text-white">{{ $users->role }}</h5>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600 display-6">Create Profile</h6> 
                                <form action="{{ route('profile.store') }}" method="POST">
                                    @csrf
                                    <div class="col-sm-6 mb-3">
                                        <label for="age" class="m-b-10 f-w-600 fs-5">Umur</label>
                                        <input type="number" name="age" id="age" class="form-control" placeholder="Masukkan umur" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="address" class="m-b-10 f-w-600 fs-5">Alamat</label>
                                        <textarea name="address" id="address" class="form-control" placeholder="Masukkan alamat" required></textarea>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ $users->id }}">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection