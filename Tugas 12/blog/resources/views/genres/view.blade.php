@extends('layouts.master')
@section('title')
Genres
@endsection

@section('content')
<div class="container mt-4">
    <a href="/genres/create" class="btn btn-primary btn-sm mb-3">Tambah Genre</a>
    <div class="card">
        <div class="card-header">
            <h4>Genres List</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Genre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($genres as $genre)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="/genres/{{$genre->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/genres/{{$genre->id}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No genres found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection