<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$namaRuangan = isset($_GET['ruangan']) ? $_GET['ruangan'] : 'AA204';

$sqlRuangan = "SELECT * FROM ruangan WHERE nama_ruangan = '{$namaRuangan}'";
$resultRuangan = $conn->query($sqlRuangan);
$ruanganDetail = $resultRuangan->fetch_assoc();

$sqlJadwal = "SELECT * FROM jadwal j
               JOIN ruangan r ON j.ruangan_id = r.ruangan_id
               WHERE r.nama_ruangan = '{$namaRuangan}' 
               ORDER BY j.hari, j.jam_mulai";
$resultJadwal = $conn->query($sqlJadwal);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Ruangan <?= htmlspecialchars($namaRuangan); ?> - TIK PNJ</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Informasi dan Jadwal Ruangan <?= htmlspecialchars($namaRuangan); ?> - TIK PNJ</h1>
    </header>
    
    <?php if ($ruanganDetail): ?>
    <section class="ruangan-info">
        <h2>Detail Ruangan:</h2>
        <p>Nama Ruangan: <?= htmlspecialchars($ruanganDetail['nama_ruangan']); ?></p>
        <p>Kapasitas: <?= htmlspecialchars($ruanganDetail['kapasitas']); ?></p>
        <p>Jenis Ruangan: <?= htmlspecialchars($ruanganDetail['jenis_ruangan']); ?></p>
        <p>Lokasi: <?= htmlspecialchars($ruanganDetail['lokasi']); ?></p>
    </section>
    <?php endif; ?>

    <section class="jadwal-info">
        <h2>Jadwal Ruangan <?= htmlspecialchars($namaRuangan); ?>:</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th>Ruangan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Akhir</th>
                    <th>Hari</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultJadwal && $resultJadwal->num_rows > 0) {
                    $no = 1;
                    while($row = $resultJadwal->fetch_assoc()) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".htmlspecialchars($row["nama_dosen"])."</td>
                                <td>".htmlspecialchars($row["nama_mata_kuliah"])."</td>
                                <td>".htmlspecialchars($row["smt"])."</td>
                                <td>".htmlspecialchars($row["kelas"])."</td>
                                <td>".htmlspecialchars($row["nama_ruangan"])."</td>
                                <td>".htmlspecialchars($row["jam_mulai"])."</td>
                                <td>".htmlspecialchars($row["jam_akhir"])."</td>
                                <td>".htmlspecialchars($row["hari"])."</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada jadwal yang tersedia.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
    
    <footer>
        <p>&copy; <?= date("Y"); ?> TIK PNJ - Informatics Engineering</p>
    </footer>
</body>
</html>
