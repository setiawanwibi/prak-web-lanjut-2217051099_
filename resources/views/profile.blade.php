<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <style>
        /* Atur font dan latar belakang dasar */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ecf0f1;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Gaya untuk wrapper utama */
        .profile-container {
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Gaya untuk gambar profil */ 
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-image: url("potoprofil.jpg"); /* Pastikan path gambar benar */
            background-size: cover;
            background-position: center; /* Pastikan gambar berada di tengah */
            display: block;
            margin: 0 auto 20px auto;
            border: 5px solid #2c3e50; /* Border lebih tebal */
        }

        /* Gaya untuk info profil */
        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Gaya untuk setiap baris informasi */
        .profile-info div {
            background-color: #f7f7f7;
            width: 300px; /* Lebar elemen diperluas */
            text-align: center;
            padding: 12px;
            margin: 8px 0;
            font-weight: bold;
            font-size: 1.1em;
            color: #2c3e50;
            border-radius: 8px;
            border: 3px solid #2c3e50; /* Border lebih tebal */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Gaya hover */
        .profile-info div:hover {
            background-color: #dfe6e9;
            cursor: pointer;
            transform: scale(1.02);
            transition: all 0.3s ease;
        }

        /* Responsif untuk tampilan lebih kecil */
        @media (max-width: 768px) {
            .profile-info div {
                width: 90%; /* Ubah width untuk perangkat lebih kecil */
                font-size: 1em;
            }

            .profile-img {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-img"></div>
        <div class="profile-info">
            <div>Muhammad Setiawan Wibisono</div>
            <div>Kelas D</div>
            <div>2217051099</div>
        </div>
    </div>
</body>
</html>
