<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil</title>

    <!-- Import Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* Gaya dasar body dengan ambience warna pastel hijau dan peach */
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #b7e4c7, #ffe5d9); /* Hijau mint dan peach */
            color: #333;
        }

        /* Kontainer utama profil dengan warna pastel */
        .profile-container {
            text-align: center;
            background-color: #fff5eb; /* Peach sangat lembut */
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
            max-width: 350px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efek hover pada kontainer */
        .profile-container:hover {
            transform: scale(1.03);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15); /* Bayangan hover lebih dalam */
        }

        /* Gaya gambar profil dengan border hijau mint */
        .Foto-Profil img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            border: 5px solid #74c69d; /* Border hijau mint */
            object-fit: cover;
        }

        /* Efek hover pada gambar profil */
        .Foto-Profil img:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Bayangan lebih dalam saat di-hover */
            transform: scale(1.05);
        }

        /* Kontainer informasi profil */
        .Info-Profil {
            width: 100%;
            margin-top: 20px;
        }

        /* Gaya untuk setiap item informasi */
        .info-item {
            background-color: #74c69d; /* Latar belakang hijau mint */
            margin: 10px 0;
            padding: 15px;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
            color: #333; /* Warna teks lebih gelap untuk kontras */
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); /* Bayangan halus */
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efek hover pada item informasi */
        .info-item:hover {
            background-color: #52b788; /* Warna lebih cerah saat di-hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Bayangan lebih dalam saat di-hover */
            transform: translateY(-5px); /* Efek melayang saat di-hover */
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="Foto-Profil">
            <img src="{{ asset('assets/img/bromoo.jpg') }}" alt="Foto Profil">
        </div>
        <div class="Info-Profil">
            <div class="info-item"><?= $nama ?></div>
            <div class="info-item"><?= $kelas ?></div>
            <div class="info-item"><?= $npm ?></div>
        </div>
    </div>
</body>
</html>
