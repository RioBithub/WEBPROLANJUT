<?php
session_start();
include 'connection.php';

// Cek apakah user sudah login sebagai admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Inisialisasi variabel untuk pesan kesalahan
$error = '';

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan validasi input
    $ruangan_id = $_POST['ruangan_id'];
    $nama_ruangan = $_POST['nama_ruangan'];
    $kapasitas = $_POST['kapasitas'];
    $jenis_ruangan = $_POST['jenis_ruangan'];
    $lokasi = $_POST['lokasi'];

    // Siapkan perintah SQL untuk update data
    $sql = "UPDATE ruangan SET nama_ruangan = ?, kapasitas = ?, jenis_ruangan = ?, lokasi = ? WHERE ruangan_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sisss", $nama_ruangan, $kapasitas, $jenis_ruangan, $lokasi, $ruangan_id);

        if ($stmt->execute()) {
            // Redirect setelah sukses
            header("location: jadwal.php?ruangan=" . $nama_ruangan);
            exit;
        } else {
            $error = "Terjadi kesalahan. Silakan coba lagi nanti.";
        }
        $stmt->close();
    }
}

// Jika ID ruangan tidak disertakan dalam URL, redirect
if (!isset($_GET["ruangan_id"]) && !isset($_POST["ruangan_id"])) {
    header("location: index.php");
    exit;
}

// ID ruangan dari GET request atau POST request
$ruangan_id = isset($_GET["ruangan_id"]) ? $_GET["ruangan_id"] : $_POST["ruangan_id"];

// Ambil data ruangan saat ini dari database
$sql = "SELECT * FROM ruangan WHERE ruangan_id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $ruangan_id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $ruangan = $result->fetch_assoc();
        } else {
            // Tidak ada ruangan dengan ID tersebut
            header("location: error.php");
            exit;
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Ruangan</title>
    <!-- Link ke CSS Anda di sini -->
</head>
<body>
    <h2>Edit Ruangan</h2>
    <?php echo $error; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="ruangan_id" value="<?php echo $ruangan_id; ?>">
        Nama Ruangan: <input type="text" name="nama_ruangan" value="<?php echo $ruangan['nama_ruangan']; ?>"><br>
        Kapasitas: <input type="text" name="kapasitas" value="<?php echo $ruangan['kapasitas']; ?>"><br>
        Jenis Ruangan: <input type="text" name="jenis_ruangan" value="<?php echo $ruangan['jenis_ruangan']; ?>"><br>
        Lokasi: <input type="text" name="lokasi" value="<?php echo $ruangan['lokasi']; ?>"><br>
        <input type="submit" value="Update Ruangan">
    </form>
</body>
</html>
