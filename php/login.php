<?php 
session_start();

// kalau udah login, ke latihan1
if(isset($_SESSION['login'])) {
    header('location: index.php');
    exit;
} 
require 'functions.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username= '$username'");
    
    // cek username
    if(mysqli_num_rows($result)===1) {
        // untuk ngitung ada berapa baris yang dikembalikan dari fungsi ini, ketemu=1, ga ada=0

        // cek password
        $row = mysqli_fetch_assoc($result);
            // $row berisi id, usernam, password dari database
        if(password_verify($password, $row['password'])) {
            // kebalikan dari password_hash = mengacak string jadi hash
            $_SESSION['login'] = true;
            header('location: index.php');
            $_SESSION['nama'] = $username;
            exit();
        }
        
    }
    $error = true;
}

if(isset($_POST['register'])) {
    header('location: registrasi.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        @import url(../css/login.css);
    </style>
</head>
<body>
    <!--
    <img src="https://treehouse.co/uploads/ciekawa-tapeta-w-lazience.jpg" alt="wallpaper_toilet" class="background">

    <h1 class="background:before">Halaman login</h1>
-->
    <?php if(isset($error)): ?>
        <p style="color:red; font-style: italic;">Username / password salah</p>
    <?php endif; ?>
    <form action="" method='post'>
        <h3>Login</h3>
        <ul>
            <li>
                <label for="username">username: </label>
                <input type="text" name="username" id="username" autocomplete="off">
            </li>
            <li>
                <label for="password">password: </label>
                <input type="password" name="password" id="password">
            </li>
            <button type='submit' name='login'>Kirim</button>
            <button type='submit' name='register'>Register</button>
            
        </ul>
    </form>
    
</body>
</html>