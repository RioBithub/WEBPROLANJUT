<?php 
session_start();
include 'connection.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Penggunaan Ruangan TIK PNJ</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .ruangan-group {
            margin-bottom: 2em;
        }
        .ruangan-group h2 {
            color: #333;
        }
        .ruangan-list {
            list-style-type: none;
            padding: 0;
        }
        .ruangan-list li {
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .ruangan-list a {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .ruangan-list a:hover {
            background-color: #0056b3;
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
            background-color: #a0aec0; /* You may need to adjust the color */
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
        <h1>Daftar Ruangan TIK PNJ</h1>
    </header>
    <div class="nav-container">
        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="daftar_ruangan.php">Daftar Ruangan</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li><a href="logout.php">Logout</a><li>
            <?php else: ?>
                <li><a href="login.php">Login Admin</a><li>
            <?php endif; ?>
        </ul>
    </div>
    <main>
        <div class="ruangan-group">
            <h2>Ruangan AA</h2>
            <ul class="ruangan-list">
                <?php
                $ruangansAA = $conn->query("SELECT nama_ruangan FROM ruangan WHERE nama_ruangan LIKE 'AA%' ORDER BY nama_ruangan");
                while($ruangan = $ruangansAA->fetch_assoc()) {
                    echo "<li><a href='jadwal.php?ruangan=" . htmlspecialchars($ruangan['nama_ruangan']) . "'>" . htmlspecialchars($ruangan['nama_ruangan']) . "</a></li>";
                }
                ?>
            </ul>
        </div>

        <div class="ruangan-group">
            <h2>Ruangan GSG</h2>
            <ul class="ruangan-list">
                <?php
                $ruangansGSG = $conn->query("SELECT nama_ruangan FROM ruangan WHERE nama_ruangan LIKE 'GSG%' ORDER BY nama_ruangan");
                while($ruangan = $ruangansGSG->fetch_assoc()) {
                    echo "<li><a href='jadwal.php?ruangan=" . htmlspecialchars($ruangan['nama_ruangan']) . "'>" . htmlspecialchars($ruangan['nama_ruangan']) . "</a></li>";
                }
                ?>
            </ul>
        </div>
    </main>
    
    <div class="footer">
        <p>&copy; <?= date("Y"); ?> Teknik Informatika dan Komputer PNJ</p>
    </div>
</body>
</html>
