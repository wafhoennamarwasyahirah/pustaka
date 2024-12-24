<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

// Ambil data buku
$result = $conn->query("SELECT * FROM buku");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Dashboard</h2>
    <div class="navbar">
        <a href="logout.php">Logout</a>
        <a href="add_book.php">Tambah Buku</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                <td data-label="Judul"><?php echo htmlspecialchars($row['judul']); ?></td>
                <td data-label="Penulis"><?php echo htmlspecialchars($row['penulis']); ?></td>
                <td data-label="Aksi">
                    <a href="edit_book.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a>
                    <a href="delete_book.php?id=<?php echo htmlspecialchars($row['id']); ?>">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>