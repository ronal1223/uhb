<?php
$host = "159.65.129.1";
$username = "root";
$password = "";
$database = "pegawai.db";

$koneksi = new mysql($host, $username, $password, $database);

if ($koneksi ->connect_error) {
	die("koneksi gagal: ". $koneksi-.connect_error);
}
?>