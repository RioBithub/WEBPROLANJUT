<?php
include 'connection.php';

// Cek apakah jadwal_id telah diterima
if(isset($_GET['jadwal_id'])){
    $jadwal_id = $_GET['jadwal_id'];

    // Query untuk mengambil data jadwal
    $query = "SELECT * FROM jadwal WHERE jadwal_id = $jadwal_id";
    $result = mysqli_query($conn, $query);
    if($result) {
        $jadwal = mysqli_fetch_assoc($result);
    } else {
        // Handle error - could not get jadwal
        die("Error: Data tidak ditemukan.");
    }
} else {
    header('Location: jadwal.php');
    exit;
}

// Cek jika form disubmit
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Ambil data dari form
    $ruangan_id = $_POST['ruangan_id'];
    $nama_dosen = $_POST['nama_dosen'];
    $nama_mata_kuliah = $_POST['nama_mata_kuliah'];
    $smt = $_POST['smt'];
    $kelas = $_POST['kelas'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_akhir = $_POST['jam_akhir'];
    $hari = $_POST['hari'];

    // Update database
    $urutan_hari = array_search(strtoupper($hari), ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU']) + 1;

    $updateQuery = "UPDATE jadwal SET ruangan_id = '$ruangan_id', nama_dosen = '$nama_dosen', 
                    nama_mata_kuliah = '$nama_mata_kuliah', smt = '$smt', kelas = '$kelas', 
                    jam_mulai = '$jam_mulai', jam_akhir = '$jam_akhir', hari = '$hari', urutan_hari = $urutan_hari 
                    WHERE jadwal_id = $jadwal_id";

    $updateResult = mysqli_query($conn, $updateQuery);

    if($updateResult){
        // Jika update berhasil, dapatkan nama ruangan untuk redirect
        $nama_ruangan_query = "SELECT nama_ruangan FROM ruangan WHERE ruangan_id = $ruangan_id";
        $nama_ruangan_result = mysqli_query($conn, $nama_ruangan_query);
        $nama_ruangan_data = mysqli_fetch_assoc($nama_ruangan_result);
        $nama_ruangan = $nama_ruangan_data['nama_ruangan'];

        // Redirect ke jadwal dengan nama ruangan
        header('Location: jadwal.php?ruangan=' . urlencode($nama_ruangan));
        exit;
    } else {
        // Jika update gagal, tampilkan pesan dan redirect untuk edit lagi
        echo "<script>alert('Gagal memperbarui jadwal.'); window.location.href='edit_jadwal.php?jadwal_id=$jadwal_id';</script>";
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal</title>
    <!-- Tambahkan CSS jika diperlukan -->
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #333;
        }
        form {
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], select, input[type="time"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
            height: 34px;
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
    <h2>Edit Jadwal</h2>
    <form method="POST">
        Ruangan ID: <input type="text" name="ruangan_id" value="<?php echo $jadwal['ruangan_id']; ?>"/><br>
        Nama Dosen: <input type="text" name="nama_dosen" value="<?php echo $jadwal['nama_dosen']; ?>"/><br>
        Mata Kuliah: <input type="text" name="nama_mata_kuliah" value="<?php echo $jadwal['nama_mata_kuliah']; ?>"/><br>
        Semester: <input type="text" name="smt" value="<?php echo $jadwal['smt']; ?>"/><br>
        Kelas: <input type="text" name="kelas" value="<?php echo $jadwal['kelas']; ?>"/><br>
        Jam Mulai: <input type="time" name="jam_mulai" value="<?php echo $jadwal['jam_mulai']; ?>"/><br>
        Jam Akhir: <input type="time" name="jam_akhir" value="<?php echo $jadwal['jam_akhir']; ?>"/><br>
        Hari: 
        <select name="hari">
            <?php
            $hari = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'];
            foreach ($hari as $h) {
                echo "<option value='$h'" . ($jadwal['hari'] == $h ? " selected" : "") . ">$h</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="Update Jadwal"/>
    </form>
</body>
</html>
