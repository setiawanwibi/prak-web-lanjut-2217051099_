<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Form</title>
    <style>
        /* Setel gaya dasar untuk body */
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #d4fc79, #96e6a1); /* Warna pastel hijau segar */
        }

        /* Kontainer form */
        .form-container {
            background-color: #fff; /* Warna putih untuk kontras */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* Bayangan lembut */
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efek hover pada kontainer */
        .form-container:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Bayangan lebih dalam saat di-hover */
        }

        /* Gaya untuk form */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Gaya label */
        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        /* Gaya input text */
        input[type="text"] {
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        /* Efek hover dan fokus pada input */
        input[type="text"]:hover, input[type="text"]:focus {
            border-color: #96e6a1; /* Hijau lembut saat di-hover */
            outline: none;
        }

        /* Gaya tombol submit */
        input[type="submit"] {
            padding: 12px;
            border: none;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Efek hover dan aktif pada tombol */
        input[type="submit"]:hover {
            background-color: #218838; /* Warna lebih gelap saat di-hover */
            transform: scale(1.05);
        }

        input[type="submit"]:active {
            background-color: #1e7e34;
        }

        /* Responsif untuk tampilan lebih kecil */
        @media (max-width: 480px) {
            .form-container {
                padding: 30px;
            }
            input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" required>

            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
