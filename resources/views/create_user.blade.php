<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #1D3557, #457B9D); /* Background gradient: biru tua ke biru muda */
        }
        .container {
            background-color: #f8f9fa; /* Warna abu-abu terang */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        h1 {
            color: #1D3557; /* Warna biru tua untuk judul */
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
            font-size: 14px;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #2A9D8F; /* Warna hijau tua */
            box-shadow: 0 0 5px rgba(42, 157, 143, 0.5); /* Hijau saat fokus */
            outline: none;
        }
        input:hover, select:hover {
            border-color: #999;
        }
        button {
            background-color: #2A9D8F; /* Warna hijau tua */
            color: white;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        button:hover {
            background-color: #21867A; /* Hijau lebih gelap saat hover */
            transform: scale(1.05);
        }
        button:active {
            transform: scale(1);
        }
        /* Responsive Design */
        @media (max-width: 500px) {
            .container {
                width: 90%;
                padding: 20px;
            }
            input, select, button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>

@extends('layouts.app') 
@section('content') 
<div class="container">
    <h1>Create User</h1>

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Input Nama -->
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Nama" required>

        <!-- Input NPM -->
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" placeholder="NPM" required>

        <!-- Select Kelas -->
        <label for="kelas_id">Kelas:</label>
        <select id="kelas_id" name="kelas_id" required>
            <option value="" disabled selected>Pilih Kelas</option>
            @foreach($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>

        <!-- Select Jurusan -->
        <label for="jurusan">Jurusan:</label>
        <select id="jurusan" name="jurusan" required>
            <option value="" disabled selected>Pilih Jurusan</option>
            <option value="S1 - Ilmu Komputer">S1 - Ilmu Komputer</option>
            <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
            <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
        </select>

        <!-- Select Semester -->
        <label for="semester">Semester:</label>
        <select id="semester" name="semester" required>
            <option value="" disabled selected>Pilih Semester</option>
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
            <option value="5">Semester 5</option>
            <option value="6">Semester 6</option>
            <option value="7">Semester 7</option>
            <option value="8">Semester 8</option>
        </select>

        <!-- Input Foto -->
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto"><br><br>

        <!-- Tombol Submit -->
        <button type="submit">Submit</button>
    </form>
</div>
@endsection

</html>