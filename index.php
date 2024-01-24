<!DOCTYPE html>
<html>
<head>
    <title>UAS Web Pro - Ruangan TIK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistem Jadwal Ruangan TIK</h1>
    </header>

    <div class="container">
        <?php
        include 'connect.php';

        $sql = "SELECT ruangan.nama_ruangan, ruangan.kapasitas, ruangan.jenis_ruangan, ruangan.lokasi, jadwal.tanggal, jadwal.waktu_mulai, jadwal.waktu_selesai FROM jadwal INNER JOIN ruangan ON jadwal.ruangan_id = ruangan.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>Nama Ruangan</th><th>Kapasitas</th><th>Jenis Ruangan</th><th>Lokasi</th><th>Tanggal</th><th>Waktu Mulai</th><th>Waktu Selesai</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["nama_ruangan"]) . "</td><td>" . htmlspecialchars($row["kapasitas"]) . "</td><td>" . htmlspecialchars($row["jenis_ruangan"]) . "</td><td>" . htmlspecialchars($row["lokasi"]) . "</td><td>" . htmlspecialchars($row["tanggal"]) . "</td><td>" . htmlspecialchars($row["waktu_mulai"]) . "</td><td>" . htmlspecialchars($row["waktu_selesai"]) . "</td></tr>";
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
