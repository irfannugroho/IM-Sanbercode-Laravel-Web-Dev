@extends('layouts.master')
@section('title')
Detail Genre
@endsection
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Genre</h4>
                </div>
                <div class="card-body">
                    <h5>Genre: {{ $genre->name }}</h5>
                    <p>Description: {{ $genre->description }}</p>
                    <a href="/genres" class="btn btn-secondary">Back to Genres</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
