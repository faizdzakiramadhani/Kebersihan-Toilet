<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
require 'functions.php';
$id = $_GET['id'];

if(isset($_POST['ubahc'])) {
    ubahchecklist($_POST);
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
    <div id="formChecklist" style="display: block;">
        <h2>Ubah Data Checklist</h2>
        <form action="" method="post">
        <input type="hidden" name='' value="">
            <ul>
                <li>
                    <label for="">Tanggal: </label>
                    <input type="datetime-local" name="" id="" required>
                </li>
                <li>
                    <label for="">Toilet id: </label>
                    <input type="text" name="" id="" required>
                </li>
                <li>
                    <label for="">Petugas id: </label>
                    <input type="text" name="" id="" required>
                </li>
                <li>
                    <label for="">Kloset: </label>
                    <select name="kloset" id="">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </li>
                <li>
                    <label for="">Wastafel: </label>
                    <select name="wastafel" id="">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </li>
                <li>
                    <label for="">Lantai: </label>
                    <select name="lantai" id="">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </li>
                <li>
                    <label for="">Dinding: </label>
                    <select name="dinding" id="">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </li>
                <li>
                    <label for="">Kaca: </label>
                    <select name="kaca" id="">
                        <option value=""></option>
                        <option value="Bersih">Bersih</option>
                        <option value="Kotor">Kotor</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </li>
                <li>
                    <label for="">Sabun: </label>
                    <select name="sabun" id="">
                        <option value=""></option>
                        <option value="Ada">Ada</option>
                        <option value="Habis">Habis</option>
                        <option value="Hilang">Hilang</option>
                    </select>
                </li>
                <li>
                    <label for="">Bau: </label>
                    <select name="bau" id="">
                        <option value=""></option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </li>
                <button type="submit" name="ubaht">Ubah Checklist</button>
            </ul>
        </form>
    </div>
</body>
</html>