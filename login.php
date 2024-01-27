<?php
session_start();
$error = '';

if (isset($_POST['submit'])) {
    include 'connection.php';
    
    $username = $conn->real_escape_string($_POST['username']);
    $password = MD5($_POST['password']);
    
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Informasi Jadwal Ruangan</title>
    <!-- Tambahkan style atau link ke styles.css Anda -->
</head>
<body>
    <h2>Login Admin</h2>
    <form action="login.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <?php echo $error; ?>
</body>
</html>
