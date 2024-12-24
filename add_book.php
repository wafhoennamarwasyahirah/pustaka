<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];

    // Menyimpan buku ke database
    $stmt = $conn->prepare("INSERT INTO buku (judul, penulis) VALUES (?, ?)");
    $stmt->bind_param("ss", $judul, $penulis);
    $stmt->execute();
    $stmt->close();

    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Buku</h2>
    <form method="POST" action="">
        <input type="text" name="judul" placeholder="Judul Buku" required>
        <input type="text" name="penulis" placeholder="Penulis Buku" required>
        <button type="submit">Tambah</button>
    </form>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>