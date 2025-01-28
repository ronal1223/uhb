<?php
include('db.php');

// Cek jika ada ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data pegawai
    $query = "DELETE FROM employees WHERE id = $id";
    if ($conn->query($query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
