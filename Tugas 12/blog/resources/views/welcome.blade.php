@extends('layouts.master')

@section('title')
Welcome Page
@endsection

@section('content')
    <h1>SELAMAT DATANG, {{ $firstName }} {{ $lastName }} !</h1>
    <h2>Terima kasih telah bergabung di SanberBook. Social Media kita bersama!</h2>
@endsection