<?php 
session_start();
include 'connection.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .utama {
            margin-top: -76px;
        }
        .login-logout {
            margin: 1em;
            text-align: right;
        }
        .login-logout a {
            color: white;
            text-decoration: none;
            background-color: #00ffff;
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
            background-color: cadetblue; /* You may need to adjust the color and opacity */
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

        .pnjlogo {
            margin-left: 20px;
        }
        .tiklogo {
            margin-left: 1185px;
            margin-top: -75px;
        }
        .image-container {
           display: flex;
           align-items: center; /* Align items vertically in the center */
           margin-top: 20px;
        }

        .first-image,
        .second-image {
           max-width: 20%; /* Set the maximum width for the images */
           height: auto;
           border-radius: 8px;
           margin-right: 20px; /* Adjust the spacing between images and captions */
        }

        .image-container p {
           text-align: justify;
           font-size: 18px;
           flex: 1; /* Allow the text to take remaining space */
        }
    </style>
</head>
<body>
    <header>
        <h1>About US</h1>
    </header>
    <div class="nav-container">
        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="daftar_ruangan.php">Daftar Ruangan</a></li>
            <li><a href="about.php">About Us</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-right"><a href="logout.php">Logout</a><li>
            <?php else: ?>
                <li class="nav-right"><a href="login.php">Login Admin</a><li>
            <?php endif; ?>
        </ul>
    </div>
    <main>
    <section>
        <h2>About Us</h2>
        <div class="image-container">
                <img src="pnj-logo.svg" alt="First Image" class="first-image">
                <p>
                Politeknik Negeri Jakarta telah tumbuh dan berkembang seiring dengan pesatnya perkembangan ilmu pengetahuan dan teknologi. 
                Dengan selalu melakukan evaluasi diri dan pengembangan kemitraan dengan berbagai lembaga, 
                merupakan suatu komitmen kelembagaan sehingga setiap perubahan baik di sisi internal maupun eksternal.
                Politeknik Negeri Jakarta merupakan perguruan tinggi negeri yang menyelenggarakan program vokasi yang 
                didirikan untuk memenuhi kebutuhan sumber daya manusia profesional di industri, baik industri jasa maupun industri manufaktur. 
                Pembelajaran menerapkan Kurikulum Nasional (Kurnas) pendidikan profesional secara bertanggung jawab dengan didukung oleh dosen-dosen profesional. 
                Sistemnya adalah dengan mempertemukan ilmu dan teknologi sesuai komposisi teori 45 persen dan praktik 55 persen yang diterapkan secara harmonis untuk 
                menghasilkan lulusan yang profesional dan memenuhi kualifikasi industri.

                </p>
            </div>

            <!-- Image Container for the second image -->
            <div class="image-container">
                <img src="tik-pnj.png" alt="Second Image" class="second-image">
            
                <p>
                Jurusan Teknik Informatika dan Komputer (TIK) diresmikan pada 2 Juni 2014 yang bertujuan untuk menghasilkan lulusan sarjana sains terapan yang
                berpengalaman dan mampu memecahkan masalah dalam bidang Teknik Informatika dan Komputer dengan menganalisis, merancang dan membangun sistem.
                Saat ini Jurusan Teknik Informatika dan Komputer memiliki empat program studi yaitu Teknik Informatika, Teknik Multimedia dan Jaringan, Teknik Multimedia Digital dan Teknik Komputer dan Jaringan.
                Selain itu terdapat program kerjasama baik dalam negeri maupun luar negeri. 
                
                Kelas program kerja sama dalam negeri yang diselenggarakan oleh jurusan TIK bekerja sama dengan B2PKLN Cevest Bekasi dan bekerja sama dengan CCIT Fakutas Teknik Universitas Indonesia. 
                Sedangkan kerja sama dengan luar negeri antara Jurusan TIK dengan Asia e-University Malaysia adalah Teknik Informatika AeU dan Tekik Multimedia dan Jaringan AeU.
                </p>
            </div>
    </section>
    </main>
    <div class="footer">
        <p>&copy; <?= date("Y"); ?> Teknik Informatika dan Komputer PNJ</p>
    </div>
</body>
</html>
