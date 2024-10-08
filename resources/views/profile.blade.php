<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
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
            background: linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(253, 227, 215, 1)); /* Updated gradient */
        }

        .profile-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 340px;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Hover effect for the container */
        .profile-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
        }

        h1 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #333;
        }

        .profile-pic {
            border-radius: 50%;
            border: 6px solid #12fff7; /* Wider Cyan border */
            margin-bottom: 20px;
            width: 150px;
            height: 150px;
            object-fit: cover; /* Makes sure the image scales properly */
        }

        .profile-info {
            margin-top: 10px;
        }

        /* Styling each info item */
        .info-item {
            background: #1e90ff; /* Soft blue background */
            color: #fff;
            margin: 12px 0;
            padding: 15px;
            border-radius: 20px;
            border: 4px solid #12fff7; /* Widened border for each info item */
            font-size: 18px; /* Slightly larger font size */
            font-weight: 600;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease, transform 0.3s ease;
        }

        /* Hover effect for each info item */
        .info-item:hover {
            background: #0f78d1; /* Slightly darker blue on hover */
            transform: translateY(-5px);
        }

        /* Circular decorative background elements */
        .profile-container::before {
            content: '';
            position: absolute;
            top: -80px;
            left: -80px;
            width: 160px;
            height: 160px;
            background-color: #b3ffab; /* Matching background tone */
            border-radius: 50%;
            z-index: -1;
            opacity: 0.3;
        }

        .profile-container::after {
            content: '';
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 160px;
            height: 160px;
            background-color: #12fff7;
            border-radius: 50%;
            z-index: -1;
            opacity: 0.3;
        }

        /* Media Query for smaller screens */
        @media (max-width: 768px) {
            .profile-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
<div class="profile-container">
    <h1>Profile User</h1>
    <div class="profile-info">
        <!-- Display profile picture -->
        <img src="{{ asset('assets/img/bromo.jpg') }}" alt="Profile Picture" class="profile-pic">
        <!-- Display user information -->
        <div class="info-item">Nama: {{ $nama }}</div>
        <div class="info-item">NPM: {{ $npm }}</div>
        <div class="info-item">Kelas: {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</div>
    </div>
</div>
</body>
</html>