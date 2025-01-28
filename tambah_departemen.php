<?php
include('db.php');

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    $query = "INSERT INTO departments (name) VALUES ('$name')";
    
    if ($conn->query($query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Departemen</title>
</head>
<body>
    <h1>Tambah Departemen</h1>
    <form action="tambah_departemen.php" method="post">
        <label for="name">Nama Departemen:</label>
        <input type="text" name="name" required><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
