<!DOCTYPE html>
<html>
<head>
    <title>UAS Web Pro - Pemesanan Ruangan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Sistem Pemesanan Ruangan</h1>
    </header>

    <div class="container">
        <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "your_database";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT ruangan.nama_ruangan, ruangan.kapasitas, ruangan.jenis_ruangan, ruangan.lokasi, jadwal.tanggal, jadwal.waktu_mulai, jadwal.waktu_selesai FROM jadwal INNER JOIN ruangan ON jadwal.ruangan_id = ruangan.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>Nama Ruangan</th><th>Kapasitas</th><th>Jenis Ruangan</th><th>Lokasi</th><th>Tanggal</th><th>Waktu Mulai</th><th>Waktu Selesai</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["nama_ruangan"]. "</td><td>" . $row["kapasitas"]. "</td><td>" . $row["jenis_ruangan"]. "</td><td>" . $row["lokasi"]. "</td><td>" . $row["tanggal"]. "</td><td>" . $row["waktu_mulai"]. "</td><td>" . $row["waktu_selesai"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada jadwal tersedia.";
        }
        $conn->close();
        ?>
    </div>

    <footer>
        <p>&copy; 2024 Tim Web Pro PNJ</p>
    </footer>
</body>
</html>
