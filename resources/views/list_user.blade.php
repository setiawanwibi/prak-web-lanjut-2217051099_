@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2); /* Soft blue gradient */
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .page-title {
        font-size: 40px;
        font-weight: bold;
        color: #2c3e50; /* Darker blue-gray */
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }

    /* Tombol Tambah Pengguna Baru */
    .btn-add-user {
        background-color: #1abc9c; /* Greenish teal */
        padding: 12px 25px;
        border-radius: 50px;
        color: white;
        font-weight: bold;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        margin-bottom: 30px;
        text-align: center;
    }

    .btn-add-user:hover {
        background-color: #16a085; /* Darker teal */
        transform: translateY(-3px); /* Slight lift */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Stronger shadow */
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 25px;
        padding: 20px;
    }

    .card {
        width: 20rem;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .card img {
        height: 220px;
        object-fit: cover;
        border-bottom: 3px solid #1abc9c; /* Accent border */
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-weight: bold;
        font-size: 22px;
        color: #34495e; /* Soft navy */
    }

    .card-text {
        font-size: 16px;
        color: #7f8c8d; /* Light gray */
    }

    .btn {
        width: 100%;
        margin-top: 15px;
        background-color: #2980b9; /* Bright blue */
        color: white;
        border-radius: 25px;
        padding: 10px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #1f6a8a; /* Darker blue */
    }
</style>

<div class="page-title">List Data</div>

<!-- Tombol Tambah Pengguna Baru -->
<a href="{{ route('users.create') }}" class="btn-add-user">Tambah Pengguna Baru</a>

<!-- Container untuk Card -->
<div class="card-container">
    @foreach($users as $user)
    <div class="card">
        <!-- Foto Pengguna -->
        <img src="{{ asset($user->foto ?? 'uploads/img/default.jpg') }}" class="card-img-top" alt="{{ $user->nama }}'s photo">
        
        <!-- Body Card -->
        <div class="card-body">
            <h5 class="card-title">{{ $user->nama }}</h5>
            <p class="card-text">NPM: {{ $user->npm }}</p>
            <p class="card-text">Kelas: {{ $user->kelas->nama_kelas ?? 'Tidak Diketahui' }}</p>
            <p class="card-text">Jurusan: {{ $user->jurusan ?? 'Tidak Diketahui' }}</p>
            <p class="card-text">Semester: {{ $user->semester ?? '-' }}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection