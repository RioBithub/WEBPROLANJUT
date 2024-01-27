<?php
// connection.php
$host = "localhost";
$user = "root";
$pass = ""; // atau password Anda jika ada
$dbname = "sistem_informasi_ruangan";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
