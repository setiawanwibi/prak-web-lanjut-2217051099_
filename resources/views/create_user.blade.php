<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #d5f3e5, #f8f0da); /* Background inspired by the uploaded image */
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15); /* Hover effect for the card */
        }

        .container::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 150px;
            height: 150px;
            background-color: #82c597;
            border-radius: 50%;
            opacity: 0.1;
            z-index: 0;
        }

        .container::after {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background-color: #6aa781;
            border-radius: 50%;
            opacity: 0.1;
            z-index: 0;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 25px;
            color: #333;
            position: relative;
            z-index: 1;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        label {
            font-weight: 600;
            font-size: 14px;
            color: #333;
            text-align: left;
        }

        input, select {
            width: 100%;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #82c597;
            outline: none;
            box-shadow: 0 0 10px rgba(130, 197, 151, 0.4);
        }

        select option[disabled] {
            color: #999;
        }

        button {
            background-color: #82c597;
            color: white;
            padding: 15px 0;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #6aa781;
            transform: scale(1.05); /* Button hover effect */
        }

        .version {
            margin-bottom: 20px;
            font-size: 12px;
            color: #666;
            position: relative;
            z-index: 1;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="version">{{ app() -> version() }}</div>
    <h1>Create User</h1>
    <form action="/user/store" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>

        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" placeholder="Masukkan NPM" required>

        <label for="kelas_id">Kelas:</label>
        <select id="kelas_id" name="kelas_id" required>
            <option value="" disabled selected>Pilih Kelas</option>
            @foreach($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>

        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>