<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
require 'functions.php';
$id = $_GET['id'];

 
if(isset($_POST['ubaht'])) {
    ubahtoilet($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah toilet dan checklist</title>
</head>
<body>
<a href="index.php">Kembali</a>
    <div id="formToilet" style="display: block;">
        <h2>Ubah Data Toilet</h2>
        <form action="" method="post" style="display: block;">
            <input type="hidden" name='' value="">
            <ul>
                <li>
                    <label for="">Lokasi: </label>
                    <input type="text" name="lokasi" id="" value="" required>
                </li>
                <li>
                    <label for="">Keterangan: </label>
                    <select name="keterangan" id="" value="">
                        <option value=""></option>
                        <option value="Belum">Belum</option>
                        <option value="Sudah">Sudah</option>
                    </select>
                </li>
                <button type="submit" name="ubahc">Ubah Toilet</button>
            </ul>
        </form>
    </div>
</body>
</html>