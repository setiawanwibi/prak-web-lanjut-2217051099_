@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk styling tabel pengguna */
    body {
        background-color: #f1f8e9; /* Warna hijau pastel lembut */
        background-image: linear-gradient(135deg, rgba(241, 248, 233, 1), rgba(214, 234, 214, 1)); /* Gradasi hijau pastel */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #ffffff; /* Warna putih untuk tabel */
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #d4edda; /* Warna hijau pucat untuk header */
        color: #333; /* Warna teks header */
    }

    tr:hover {
        background-color: #c3e6cb; /* Warna hijau terang saat hover */
    }

    /* Gaya untuk tombol */
    .action-buttons a, .action-buttons button {
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-view {
        background-color: #007bff; /* Biru untuk View */
    }

    .btn-view:hover {
        background-color: #0056b3; /* Biru lebih gelap saat hover */
    }

    .btn-edit {
        background-color: #28a745; /* Hijau untuk Edit */
    }

    .btn-edit:hover {
        background-color: #218838; /* Hijau lebih gelap saat hover */
    }

    .btn-delete {
        background-color: #dc3545; /* Merah untuk Delete */
    }

    .btn-delete:hover {
        background-color: #c82333; /* Merah lebih gelap saat hover */
    }

    td .action-buttons {
        display: flex;
        gap: 10px; /* Spasi antar tombol */
    }

    td .action-buttons form {
        margin: 0;
    }

    /* Tombol Tambah Pengguna Baru */
    .btn-add-user {
        background-color: #28a745; /* Hijau seperti tombol Edit */
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-add-user:hover {
        background-color: #218838; /* Hijau lebih gelap saat hover */
        transform: translateY(-2px); /* Efek hover naik sedikit */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan saat hover */
    }

    /* Styling untuk judul "List Data" */
    .page-title {
        font-size: 40px; /* Ukuran font besar */
        font-weight: bold;
        color: #333; /* Warna teks */
        margin-bottom: 20px;
        text-align: center; /* Pusatkan teks */
    }
</style>

<!-- Judul Halaman -->
<br>
<div class="page-title">List Data</div>

<!-- Tombol Tambah Pengguna Baru -->
<a href="{{ route('users.create') }}" class="btn-add-user mb-3">Tambah Pengguna Baru</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->npm }}</td>
                <td>{{ $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</td>
                <td>
                    @if($user->foto)
                        <img src="{{ asset($user->foto ?? 'uploads/img/default.jpg') }}" alt="Foto Pengguna" width="100">
                    @else
                        <span>Foto tidak tersedia</span>
                    @endif
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('users.show', $user->id) }}" class="btn-view">View</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
