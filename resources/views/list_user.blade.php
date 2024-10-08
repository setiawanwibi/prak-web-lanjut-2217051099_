@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk styling tabel pengguna */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px; /* Membuat sudut tabel lebih membulat */
        overflow: hidden; /* Menyembunyikan overflow untuk border-radius */
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s; /* Transisi saat hover */
    }

    th {
        background-color: #a8e6cf; /* Warna hijau pastel */
        color: #333; /* Warna teks header */
        font-weight: bold; /* Menebalkan teks */
        letter-spacing: 1px; /* Memberi jarak antar huruf */
    }

    tr:hover {
        background-color: #d8f3dc; /* Warna saat hover */
    }

    /* Gaya untuk tombol */
    .btn-primary {
        background-color: #4caf50; /* Warna hijau */
        border: none; /* Menghapus border */
        color: #fff; /* Warna teks */
        padding: 10px 15px; /* Ukuran tombol */
        border-radius: 5px; /* Sudut membulat */
        transition: background-color 0.3s, transform 0.2s; /* Transisi untuk efek hover */
    }

    .btn-primary:hover {
        background-color: #388e3c; /* Warna lebih gelap saat hover */
        transform: translateY(-2px); /* Efek angkat saat hover */
    }

    .btn-danger {
        background-color: #f44336; /* Warna merah */
        border: none;
        color: #fff;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.2s; /* Transisi untuk efek hover */
    }

    .btn-danger:hover {
        background-color: #c62828; /* Warna lebih gelap saat hover */
        transform: translateY(-2px); /* Efek angkat saat hover */
    }

    /* Responsif untuk tampilan lebih kecil */
    @media (max-width: 768px) {
        table {
            font-size: 14px; /* Ukuran font lebih kecil untuk mobile */
        }

        th, td {
            padding: 10px; /* Padding lebih kecil */
        }

        .btn-primary, .btn-danger {
            padding: 8px 12px; /* Ukuran tombol lebih kecil */
        }
    }
</style>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
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
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
