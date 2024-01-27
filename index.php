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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        main {
            padding: 1em;
        }
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
    </style>
</head>
<body>
    <header>
        <h1>Sistem Informasi Jadwal Ruangan TIK PNJ</h1>
        <div class="login-logout">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login Admin</a>
            <?php endif; ?>
        </div>
    </header>

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
    
    <footer>
         <p>&copy; <?= date("Y"); ?> TIK PNJ - Informatics Engineering</p>
    </footer>
</body>
</html>
