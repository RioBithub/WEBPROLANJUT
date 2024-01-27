<?php 
session_start();
include 'connection.php'; 

// Set locale ke bahasa Indonesia
// Set locale ke bahasa Indonesia
setlocale(LC_TIME, 'id_ID');

// Mendapatkan nama hari ini dalam bahasa Indonesia
$hariIni = date('N');  // Mendapatkan angka hari, 1 untuk Senin, 2 untuk Selasa, dst.

// Defaulting untuk hari Sabtu dan Minggu
if ($hariIni >= 6) {
    // Jika hari ini adalah Sabtu atau Minggu, atur $hariIni ke hari Senin
    $hariIni = 'Senin';
}

// Reset locale ke default (bahasa sistem) jika diperlukan
setlocale(LC_TIME, '');

// Variabel $namaRuangan harus didefinisikan sebelumnya
$namaRuangan = "NamaRuanganContoh";

// Query untuk mengambil jadwal berdasarkan ruangan dan hari ini
$sqlJadwal = "SELECT j.*, r.nama_ruangan FROM jadwal j 
              JOIN ruangan r ON j.ruangan_id = r.ruangan_id 
              WHERE j.hari = '{$hariIni}'
              ORDER BY j.jam_mulai";

$resultJadwal = $conn->query($sqlJadwal);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Penggunaan Ruangan TIK PNJ</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        header{
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        footer{
            text-align: center;
            padding: 8px;
        }
        main {
            padding: 1em;
        }
        .login-logout {
            margin: 1em;
            text-align: right;
        }
        .login-logout a {
            color: white;
            text-decoration: none;
            background-color: #007bff;
            padding: 8px 12px;
            border-radius: 4px;
        }
        .login-logout a:hover {
            background-color: #0056b3;
        }

        .nav-container {
            width: 100%;
            min-height: 50px;
            display: flex;
                justify-content: space-between;
            align-items: center;
            color: #fff;
            z-index: 10;
            background-color: rgba(74, 85, 104, 0.8); /* You may need to adjust the color and opacity */
        }

        .nav-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .nav-list li {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .nav-list li:hover {
            background-color: #a0aec0; /* You may need to adjust the color */
            border-radius: 0.25rem;
        }

        .nav-list a {
            text-decoration: none;
            color: inherit;
            display: inline-block;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistem Informasi Jadwal Ruangan TIK PNJ</h1>
    </header>

    <main>
    <div class="nav-container">
        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="daftar_ruangan.php">Daftar Ruangan</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li><a href="logout.php">Logout</a><li>
            <?php else: ?>
                <li><a href="login.php">Login Admin</a><li>
            <?php endif; ?>
        </ul>
    </div>
    <section>
        <h2>Jadwal Ruangan Hari Ini</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>Mata Kuliah</th>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th>Jam Mulai</th>
                    <th>Jam Akhir</th>
                    <th>Hari</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultJadwal && $resultJadwal->num_rows > 0) {
                    $no = 1;
                    while ($row = $resultJadwal->fetch_assoc()) {
                        echo "<tr>
                                <td style='width: 5%;'>" . $no++ . "</td>
                                <td style='width: 17.5%;'>" . htmlspecialchars($row["nama_dosen"]) . "</td>
                                <td style='width: 15%;'>" . htmlspecialchars($row["nama_mata_kuliah"]) . "</td>
                                <td style='width: 5%;'>" . htmlspecialchars($row["smt"]) . "</td>
                                <td style='width: 7.5%;'>" . htmlspecialchars($row["kelas"]) . "</td>
                                <td style='width: 7.5%;'>" . htmlspecialchars($row["jam_mulai"]) . "</td>
                                <td style='width: 7.5%;'>" . htmlspecialchars($row["jam_akhir"]) . "</td>
                                <td style='width: 5%;'>" . htmlspecialchars($row["hari"]) . "</td>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada jadwal yang tersedia.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
    </main>
    
    <footer>
         <p>&copy; <?= date("Y"); ?> TIK PNJ - Informatics Engineering</p>
    </footer>
</body>
</html>
