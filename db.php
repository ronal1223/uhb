<?php
$servername = "159.65.129.1"; // ganti dengan server Anda
$username = "root";        // ganti dengan username MySQL Anda
$password = "@1234Uhb";            // ganti dengan password MySQL Anda
$dbname = "pegawai";       // ganti dengan nama database Anda

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
