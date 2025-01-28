<?php
$host = 'localhost'; // atau alamat server database
$username = 'root';  // username database
$password = '';      // password database
$database = 'pegawai_db'; // nama database

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
