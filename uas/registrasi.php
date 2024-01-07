<?php 
require 'functions.php';

if(isset($_POST['submit'])) {
    if(registrasi($_POST) > 0 ) {
        // kalau nilainya lebih dari 0 maka ada user yang berhasil masuk database
        echo "<script>
        alert('user baru berhasil ditambahkan');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasi</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Username: </label>
                <input type="text" name='username' id="nama" autocomplete="off">
                    <!--autocomplete="off" nonaktifkan saran dari google-->
            </li>
            <li>
                <label for="pass">Password: </label>
                <input type="password" name='password' id="pass">
            </li>
            <li>
                <label for="pass2">Konfirmasi Password: </label>
                <input type="password" name='password2' id="pass2">
            </li>
            <li>
                <button type='submit' name='submit'>Submit</button>
            </li>
        </ul>
    </form>
</body>
</html>