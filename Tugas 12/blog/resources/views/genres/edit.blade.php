@extends('layouts.master')
@section('title')
Edit Genre
@endsection
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Genre</h4>
                </div>
                <div class="card-body">
                    <form action="/genres/{{$genre->id}}" method="POST">
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
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="name" value="{{ $genre->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $genre->description }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/genres" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
