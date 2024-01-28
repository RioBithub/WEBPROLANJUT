<?php
session_start();
include 'connection.php';

// Cek apakah user sudah login sebagai admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Inisialisasi variabel
$error = '';

// Cek apakah form telah disubmit
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

    // Check for empty or null input
    if (empty($ruangan_id) || empty($nama_dosen) || empty($mata_kuliah) || empty($semester) || empty($kelas) || empty($jam_mulai) || empty($jam_akhir) || empty($hari)) {
        $error = "Semua kolom harus diisi. Silakan coba lagi.";
    } else {
        // Calculate urutan_hari
        $urutan_hari = array_search(strtoupper($hari), ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU']) + 1;

        // Siapkan perintah SQL untuk insert data
        $sql = "INSERT INTO jadwal (ruangan_id, nama_dosen, nama_mata_kuliah, smt, kelas, jam_mulai, jam_akhir, hari, urutan_hari) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("isssssssi", $ruangan_id, $nama_dosen, $mata_kuliah, $semester, $kelas, $jam_mulai, $jam_akhir, $hari, $urutan_hari);

            if ($stmt->execute()) {
                // Setelah berhasil menambahkan jadwal, arahkan kembali ke halaman jadwal dengan nama ruangan yang sesuai
                $sqlRuangan = "SELECT nama_ruangan FROM ruangan WHERE ruangan_id = ?";
                if ($stmtRuangan = $conn->prepare($sqlRuangan)) {
                    $stmtRuangan->bind_param("i", $ruangan_id);
                    if ($stmtRuangan->execute()) {
                        $resultRuangan = $stmtRuangan->get_result();
                        $rowRuangan = $resultRuangan->fetch_assoc();
                        $namaRuangan = $rowRuangan['nama_ruangan'];

                        header("location: jadwal.php?ruangan=" . urlencode($namaRuangan));
                        exit;
                    }
                    $stmtRuangan->close();
                }
            } else {
                $error = "Terjadi kesalahan saat menambahkan jadwal. Silakan coba lagi nanti.";
            }
            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal</title>
    <!-- Link ke file CSS Anda -->
    <script>
        // Fungsi untuk menampilkan konfirmasi dialog sebelum kembali ke halaman sebelumnya
        function confirmBack() {
            var confirmation = confirm("Maaf, semua field harus diisi. Klik OK untuk kembali.");
            if (confirmation) {
                window.history.back();
            }
        }

        // Cek apakah ada pesan kesalahan
        <?php if (!empty($error)): ?>
            // Tampilkan konfirmasi dialog jika ada pesan kesalahan
            confirmBack();
        <?php endif; ?>
    </script>
</head>
<body>
    <h2>Tambah Jadwal Baru</h2>
    <?php if (!empty($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <!-- Form untuk kembali ke halaman sebelumnya, jika perlu -->
</body>
</html>
