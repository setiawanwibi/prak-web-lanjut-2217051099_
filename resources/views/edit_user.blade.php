<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User_PWL</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background: linear-gradient(135deg, #74ebd5, #ACB6E5) !important; /* Background gradient */
    }
    .container {
        background-color: white;
        padding: 30px !important;
        border-radius: 20px !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        width: 100vw !important; /* Updated to use full width */
        max-width: 600px !important; /* Optional: max-width for larger screens */
        text-align: center !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    }
    h1 {
        color: #333 !important;
        font-size: 24px !important;
        font-weight: 600 !important;
        margin-bottom: 20px !important;
    }
    form {
        display: flex !important;
        flex-direction: column !important;
        align-items: stretch !important;
    }
    label {
        font-weight: 600 !important;
        margin-bottom: 5px !important;
        color: #333 !important;
        font-size: 14px !important;
    }
    input, select {
        width: 100% !important;
        padding: 12px !important;
        margin-bottom: 15px !important;
        border: 1px solid #ccc !important;
        border-radius: 6px !important;
        font-size: 16px !important;
        transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
    }
    input:focus, select:focus {
        border-color: #28a745 !important;
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.5) !important;
        outline: none !important;
    }
    button {
        background-color: #28a745 !important;
        color: white !important;
        padding: 12px !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        border: none !important;
        border-radius: 6px !important;
        cursor: pointer !important;
        transition: background 0.3s ease, transform 0.3s ease !important;
        position: relative !important;
        overflow: hidden !important;
    }
    button:hover {
        background-color: #218838 !important;
        transform: translateY(-3px) !important;
    }
    button:active {
        transform: translateY(0) !important;
    }
    /* Responsive Design */
    @media (max-width: 600px) {
        .container {
            width: 95vw !important;
            padding: 20px !important;
        }
        input, select, button {
            font-size: 14px !important;
            padding: 10px !important;
        }
        h1 {
            font-size: 20px !important;
        }
    }
</style>

</head>
@extends('layouts.app')
@section('content')

<form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container mt-5">
        <h1 class="text-center">Edit Data</h1>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $user->nama) }}">
        </div>
        <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control" name="npm" id="npm" value="{{ old('npm', $user->npm) }}">
        </div>
        <div class="form-group">
            <label for="kelas_id">Kelas</label>
            <select class="form-select" name="kelas_id" id="kelas_id" required>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}"
                        {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($user->foto)
                <img src="{{ asset($user->foto) }}" alt="User Photo" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
</html>
