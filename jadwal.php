<?php
session_start();
include 'connection.php';

$namaRuangan = isset($_GET['ruangan']) ? $_GET['ruangan'] : 'AA204';
$adminLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

// Query untuk mengambil informasi ruangan
$sqlRuangan = "SELECT * FROM ruangan WHERE nama_ruangan = '{$namaRuangan}'";
$resultRuangan = $conn->query($sqlRuangan);
$ruangan = ($resultRuangan && $resultRuangan->num_rows > 0) ? $resultRuangan->fetch_assoc() : null;

// Query untuk mengambil jadwal berdasarkan ruangan
$sqlJadwal = "SELECT j.*, r.nama_ruangan FROM jadwal j JOIN ruangan r ON j.ruangan_id = r.ruangan_id WHERE r.nama_ruangan = '{$namaRuangan}' ORDER BY j.hari, j.jam_mulai";
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
        <h1>Jadwal Ruangan <?= htmlspecialchars($namaRuangan); ?> - TIK PNJ</h1>
    </header>

    <?php if ($adminLoggedIn): ?>
        <section>
            <h2>Tambah Jadwal Baru</h2>
            <form action="tambah_jadwal.php" method="post">
                <input type="hidden" name="ruangan_id" value="<?= $ruangan ? $ruangan['ruangan_id'] : ''; ?>">
                Nama Dosen: <input type="text" name="nama_dosen"><br>
                Mata Kuliah: <input type="text" name="mata_kuliah"><br>
                Semester: <input type="text" name="semester"><br>
                Kelas: <input type="text" name="kelas"><br>
                Jam Mulai: <input type="time" name="jam_mulai"><br>
                Jam Akhir: <input type="time" name="jam_akhir"><br>
                Hari: <input type="text" name="hari"><br>
                <input type="submit" value="Tambah Jadwal">
            </form>
        </section>
    <?php endif; ?>

    <section>
        <?php if ($ruangan): ?>
            <h2>Informasi Ruangan</h2>
            <p>Nama Ruangan: <?= htmlspecialchars($ruangan['nama_ruangan']); ?></p>
            <p>Kapasitas: <?= htmlspecialchars($ruangan['kapasitas']); ?></p>
            <p>Jenis Ruangan: <?= htmlspecialchars($ruangan['jenis_ruangan']); ?></p>
            <p>Lokasi: <?= htmlspecialchars($ruangan['lokasi']); ?></p>
            <?php if ($adminLoggedIn): ?>
                <a href="edit_ruangan.php?ruangan_id=<?= $ruangan['ruangan_id']; ?>">Edit Informasi Ruangan</a>
            <?php endif; ?>
        <?php else: ?>
            <p>Informasi ruangan tidak tersedia.</p>
        <?php endif; ?>
    </section>

    <section>
        <h2>Jadwal Ruangan</h2>
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
                    <?php if ($adminLoggedIn): ?>
                        <th>Aksi</th>
                    <?php endif; ?>
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
                                <td>".htmlspecialchars($row["jam_mulai"])."</td>
                                <td>".htmlspecialchars($row["jam_akhir"])."</td>
                                <td>".htmlspecialchars($row["hari"])."</td>";
                        if ($adminLoggedIn) {
                            echo "<td>
                                    <a href='edit_jadwal.php?id=".$row["jadwal_id"]."'>Edit</a> |
                                    <a href='delete_jadwal.php?id=".$row["jadwal_id"]."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\");'>Hapus</a>
                                  </td>";
                        }
                        echo "</tr>";
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
