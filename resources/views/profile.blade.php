/* File: public/css/style.css */

/* Reset margin dan padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f0f4f8;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Container utama */
.container {
    background-color: #fff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

/* Judul halaman */
h1 {
    font-size: 24px;
    color: #333;
    text-align: center;
    margin-bottom: 1.5rem;
}

/* Tabel data profil */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1rem;
}

table th, table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #f8f9fa;
    color: #333;
}

table td {
    font-size: 16px;
}

/* Button */
button {
    display: inline-block;
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    margin-top: 1rem;
    width: 100%;
}

button:hover {
    background-color: #218838;
}

/* Form styling */
form {
    display: flex;
    flex-direction: column;
}

form label {
    margin-bottom: 0.5rem;
    font-weight: bold;
}

form input {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 1rem;
    font-size: 16px;
}

form input:focus {
    border-color: #28a745;
    outline: none;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
}