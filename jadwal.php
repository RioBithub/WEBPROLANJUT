<?php
session_start();
include 'connection.php';

$namaRuangan = isset($_GET['ruangan']) ? $_GET['ruangan'] : 'AA204';
$adminLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

$sqlRuangan = "SELECT * FROM ruangan WHERE nama_ruangan = '{$namaRuangan}'";
$resultRuangan = $conn->query($sqlRuangan);
$ruangan = ($resultRuangan && $resultRuangan->num_rows > 0) ? $resultRuangan->fetch_assoc() : null;

$sqlJadwal = "SELECT j.*, r.nama_ruangan FROM jadwal j JOIN ruangan r ON j.ruangan_id = r.ruangan_id WHERE r.nama_ruangan = '{$namaRuangan}' ORDER BY j.hari DESC, j.jam_mulai";
$resultJadwal = $conn->query($sqlJadwal);

// Inisialisasi variabel error
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan validasi input
    $ruangan_id = $_POST['ruangan_id'];
    $nama_dosen = $_POST['nama_dosen'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $semester = $_POST['semester'];
    $kelas = $_POST['kelas'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_akhir = $_POST['jam_akhir'];
    $hari = $_POST['hari'];

    // Validasi form
    if (empty($nama_dosen) || empty($mata_kuliah) || empty($semester) || empty($kelas) || empty($jam_mulai) || empty($jam_akhir) || empty($hari)) {
        $error = "Harap isi semua field sebelum menambahkan jadwal.";
    } else {
        // Siapkan perintah SQL untuk insert data
        $sql = "INSERT INTO jadwal (ruangan_id, nama_dosen, nama_mata_kuliah, smt, kelas, jam_mulai, jam_akhir, hari) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("isssssss", $ruangan_id, $nama_dosen, $mata_kuliah, $semester, $kelas, $jam_mulai, $jam_akhir, $hari);

            if ($stmt->execute()) {
                // Redirect setelah sukses
                header("location: jadwal.php?ruangan=" . $namaRuangan);
                exit;
            } else {
                $error = "Terjadi kesalahan. Silakan coba lagi nanti.";
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Ruangan <?= htmlspecialchars($namaRuangan); ?> - TIK PNJ</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #dcdcdc;
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
            background-color: rgba(74, 85, 104, 0.8); /* Adjust the color and opacity as needed */
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

        .informasiruangan {
            margin-left: 20px;
            margin-right: 700px;
            margin-top: -490px;
        }

        .tambahjadwal {
            margin-left: 700px;
            margin-right: 20px;
        }

        .jadwalruangan {
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 10px;
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
            <li><a href="about.php">About</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="right-align"><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li class="right-align"><a href="login.php">Login Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <main>
        <?php if ($adminLoggedIn): ?>
            <div class="tambahjadwal">
                <section>
                    <h2 align="center">Tambah Jadwal Baru</h2>
                    <form action="tambah_jadwal.php" method="post">
                        <input type="hidden" name="ruangan_id" value="<?= $ruangan ? $ruangan['ruangan_id'] : ''; ?>">
                        <table border="1" width="550" height="100">
                            <tr>
                                <th align="left">Nama Dosen</th>
                                <th>:</th>
                                <td><input type="text" name="nama_dosen"></td>
                            </tr>
                            <tr>
                                <th align="left">Mata Kuliah</th>
                                <th>:</th>
                                <td><input type="text" name="mata_kuliah"></td>
                            </tr>
                            <tr>
                                <th align="left">Semester</th>
                                <th>:</th>
                                <td><input type="text" name="semester"></td>
                            </tr>
                            <tr>
                                <th align="left">Kelas</th>
                                <th>:</th>
                                <td><input type="text" name="kelas"></td>
                            </tr>
                            <tr>
                                <th align="left">Jam Mulai</th>
                                <th>:</th>
                                <td><input type="time" name="jam_mulai"></td>
                            </tr>
                            <tr>
                                <th align="left">Jam Akhir</th>
                                <th>:</th>
                                <td><input type="time" name="jam_akhir"></td>
                            </tr>
                            <tr>
                                <th align="left">Hari</th>
                                <th>:</th>
                                <td><input type="text" name="hari"></td>
                            </tr>
                        </table>
                        <br/>
                        <input type="submit" value="Tambah Jadwal">
                    </form>
                </section>
            </div>
            <?php endif; ?>

            <div class="informasiruangan">
                <section>
                    <?php if ($ruangan): ?>
                        <h2 align="center">Informasi Ruangan</h2>
                        <form action="tambah_jadwal.php" method="post">
                            <table border="3" width="550" height="200">
                                <tr>
                                    <th align="left">Nama Ruangan</th>
                                    <th> : </th>
                                    <td><?= htmlspecialchars($ruangan['nama_ruangan']); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Kapasitas</th>
                                    <th> : </th>
                                    <td><?= htmlspecialchars($ruangan['kapasitas']); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Jenis Ruangan</th>
                                    <th> : </th>
                                    <td><?= htmlspecialchars($ruangan['jenis_ruangan']); ?></td>
                                </tr>
                                <tr>
                                    <th align="left">Lokasi</th>
                                    <th> : </th>
                                    <td><?= htmlspecialchars($ruangan['lokasi']); ?><</td>
                                </tr>
                            </table>
                        </form>
                        <br/>
                        <?php if ($adminLoggedIn): ?>
                            <a href="edit_ruangan.php?ruangan_id=<?= $ruangan['ruangan_id']; ?>">Edit Informasi Ruangan</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <p>Informasi ruangan tidak tersedia.</p>
                    <?php endif; ?>
                </section>
            </div>
            <br/><br/>
            <br/><br/>
            <br/>
            <hr/>
            <div class="jadwalruangan">
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
                                echo "<tr align=center>
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
        </div>
    </main>
    <div class="footer">
        <p>&copy; <?= date("Y"); ?> Teknik Informatika dan Komputer PNJ</p>
    </div>
</body>
</html>
