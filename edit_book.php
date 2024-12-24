<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM buku WHERE id = $id");
    $book = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];

    // Mengupdate buku di database
    $stmt = $conn->prepare("UPDATE buku SET judul = ?, penulis = ? WHERE id = ?");
    $stmt->bind_param("ssi", $judul, $penulis, $id);
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
    <title>Edit Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Buku</h2>
    <form method="POST" action="">
        <input type="text" name="judul" value="<?php echo $book['judul']; ?>" required>
        <input type="text" name="penulis" value="<?php echo $book['penulis']; ?>" required>
        <button type="submit">Update</button>
    </form>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>