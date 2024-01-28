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
            background-color: cadetblue /* You may need to adjust the color and opacity */
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
        <h1 align="center">Daftar Ruangan TIK PNJ</h1>
    </header>
    <div class="nav-container">
        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="daftar_ruangan.php">Daftar Ruangan</a></li>
            <li><a href="about.php">About</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li><a href="logout.php">Logout</a><li>
            <?php else: ?>
                <li><a href="login.php">Login Admin</a><li>
            <?php endif; ?>
        </ul>
    </div>
    <main>
            <?php
            $team = array(
                array(
                    'name' => 'Allia Chyanda Putri',
                    'NIM ' => '2207411057',
                    'bio' =>  'Saya hanya ingin lulus mata kuliah ini dengan nilai minimal B',
                ),
                array(
                    'name' =>     'Nurul Hasanah',
                    'position' => '2207411036',
                    'bio' =>      'Bismillah Cumlaude',
                ),
                array(
                    'name' => 'Fariz Haidar',
                    'NIM ' => '2207411060',
                    'bio' =>  'sama',
                ),
                array(
                    'name' => 'Deva Alvyn Budinugraha',
                    'NIM ' => '2207411050',
                    'bio' =>  'Tahan Lama',
                ),
                array(
                    'name' => 'Muhammad Rizky Ramadhani',
                    'NIM ' => '2207411044',
                    'bio' =>  'Buzank Terbaik',
                ),
                // Add more team members as needed
            );
            
            // Display team members
            foreach ($team as $member) {
                ?>
                <div class="team-member">
                    <h2><?php echo $member['name']; ?></h2>
                    <p><?php echo $member['bio']; ?></p>
                </div>
                <?php
            }
            ?>
        
    </main>
    
    <div class="footer">
        <p>&copy; <?= date("Y"); ?> Teknik Informatika dan Komputer PNJ</p>
    </div>
</body>
</html>
