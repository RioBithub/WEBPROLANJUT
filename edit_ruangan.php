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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
        }
        form {
            margin: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Edit Ruangan</h2>
    <?php echo $error; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="ruangan_id" value="<?php echo $ruangan_id; ?>">
        <label for="nama_ruangan">Nama Ruangan:</label>
        <input type="text" name="nama_ruangan" id="nama_ruangan" value="<?php echo $ruangan['nama_ruangan']; ?>">

        <label for="kapasitas">Kapasitas:</label>
        <input type="text" name="kapasitas" id="kapasitas" value="<?php echo $ruangan['kapasitas']; ?>">

        <label for="jenis_ruangan">Jenis Ruangan:</label>
        <input type="text" name="jenis_ruangan" id="jenis_ruangan" value="<?php echo $ruangan['jenis_ruangan']; ?>">

        <label for="lokasi">Lokasi:</label>
        <input type="text" name="lokasi" id="lokasi" value="<?php echo $ruangan['lokasi']; ?>">

        <input type="submit" value="Update Ruangan">
    </form>
</body>
</html>
