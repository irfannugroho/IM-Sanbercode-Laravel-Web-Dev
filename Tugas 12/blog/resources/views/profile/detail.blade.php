@extends('layouts.master')
@section('title')
Profile
@endsection

@section('content')

<div class="page-content page-container container" id="page-content">
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
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600 display-6">Information</h6> <!-- Menggunakan display-6 -->
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600 fs-5">ID Akun</p> <!-- Menggunakan fs-5 -->
                                    <h5 class="text-muted f-w-400 fs-4">{{ $users->id }}</h5> <!-- Menggunakan fs-4 -->
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600 fs-5">Umur</p> <!-- Menggunakan fs-5 -->
                                    <h6 class="text-muted f-w-400 fs-4">{{ $profile->age }} tahun</h6> <!-- Menggunakan fs-4 -->
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600 fs-5">Alamat</p> <!-- Menggunakan fs-5 -->
                                    <h6 class="text-muted f-w-400 fs-4">{{ $profile->address }}</h6> <!-- Menggunakan fs-4 -->
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600 fs-5">Email</p> <!-- Menggunakan fs-5 -->
                                    <h5 class="text-muted f-w-400 fs-4">{{ $users->email }}</h5> <!-- Menggunakan fs-4 -->
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li class="me-2">
                                        <a href="{{ route('profile.edit', $profile->id) }}">
                                            <i class="bi bi-pencil-square fs-3"></i>
                                        </a>
                                    </li>
                                    <li class="me-2">
                                        <form id="delete-form" action="{{ route('profile.destroy', $profile->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="#" onclick="event.preventDefault(); confirmDelete();">
                                            <i class="bi bi-trash fs-3"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        if (confirm('Apakah Anda yakin ingin menghapus profil ini?')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>

@endsection