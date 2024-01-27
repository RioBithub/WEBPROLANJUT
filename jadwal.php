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
$sqlJadwal = "SELECT j.*, r.nama_ruangan FROM jadwal j JOIN ruangan r ON j.ruangan_id = r.ruangan_id WHERE r.nama_ruangan = '{$namaRuangan}' ORDER BY j.hari DESC, j.jam_mulai";
$resultJadwal = $conn->query($sqlJadwal);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Ruangan <?= htmlspecialchars($namaRuangan); ?> - TIK PNJ</title>
    <link rel="stylesheet" href="styles.css">
    <style>
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
            background-color: #a0aec0;
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
        <h1>Jadwal Ruangan <?= htmlspecialchars($namaRuangan); ?> - TIK PNJ</h1>
    </header>
    <div class="nav-container">
        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="daftar_ruangan.php">Daftar Ruangan</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="right-align"><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li class="right-align"><a href="login.php">Login Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <main>
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
                        while ($row = $resultJadwal->fetch_assoc()) {
                            echo "<tr>
                                    <td style='width: 5%;'>" . $no++ . "</td>
                                    <td style='width: 17.5%;'>" . htmlspecialchars($row["nama_dosen"]) . "</td>
                                    <td style='width: 15%;'>" . htmlspecialchars($row["nama_mata_kuliah"]) . "</td>
                                    <td style='width: 5%;'>" . htmlspecialchars($row["smt"]) . "</td>
                                    <td style='width: 5%;'>" . htmlspecialchars($row["kelas"]) . "</td>
                                    <td style='width: 7.5%;'>" . htmlspecialchars($row["jam_mulai"]) . "</td>
                                    <td style='width: 7.5%;'>" . htmlspecialchars($row["jam_akhir"]) . "</td>
                                    <td style='width: 5%;'>" . htmlspecialchars($row["hari"]) . "</td>";
                            if ($adminLoggedIn) {
                                echo "<td style='width: 7.5%;'>
                                        <a href='edit_jadwal.php?id=" . $row["jadwal_id"] . "'>Edit</a> |
                                        <a href='delete_jadwal.php?id=" . $row["jadwal_id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\");'>Hapus</a>
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
    </main>
    <div class="footer">
        <p>&copy; <?= date("Y"); ?> Teknik Informatika dan Komputer PNJ</p>
    </div>
</body>
</html>
