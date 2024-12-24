<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); /* Ganti dengan gambar latar belakang yang sesuai */
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px 20px;
        }
        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px; /* Jarak antara paragraf dan tombol */
        }
        a {
            text-decoration: none;
            background-color: #ff9800; /* Warna latar belakang tombol */
            color: white; /* Warna teks */
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 1.2em;
            transition: background-color 0.3s;
            display: inline-block; /* Agar margin berfungsi dengan baik */
            margin-bottom: 20px; /* Jarak di bawah tombol */
        }
        a:hover {
            background-color: #e68900; /* Warna saat hover */
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: rgba(0, 0, 0, 0.5); /* Background transparan untuk konten */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Perpustakaan</h1>
        <p>Temukan buku-buku terbaik dan tingkatkan pengetahuan Anda!</p>
        <a href="login.php">Login</a>
    </div>
</body>
</html>