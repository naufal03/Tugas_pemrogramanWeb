<?php
$host = "localhost";
$username = "root";
$password = ""; // Kosong jika default di XAMPP
$dbname = "pweb"; // Ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $username, $password, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
