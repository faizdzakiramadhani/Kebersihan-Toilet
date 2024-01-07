<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
require 'functions.php';
$id = $_GET['id'];
$tampilc = query("SELECT * FROM checklist where id='$id'")[0];
$tolid = query("SELECT * FROM toilet");
$userid = query("SELECT * FROM users");

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
        <ul>Data sebelumnya
            <li>Tanggal= <?= $tampilc['tanggal']; ?></li>
            <li>Toilet id= <?= $tampilc['toilet_id']; ?></li>
            <li>Kloset= <?= $tampilc['kloset']; ?></li>
            <li>Wastafel= <?= $tampilc['wastafel']; ?></li>
            <li>Lantai= <?= $tampilc['lantai']; ?></li>
            <li>Dinding= <?= $tampilc['dinding']; ?></li>
            <li>Kaca= <?= $tampilc['kaca']; ?></li>
            <li>Sabun= <?= $tampilc['sabun']; ?></li>
            <li>Bau= <?= $tampilc['bau']; ?></li>
            <li>User id= <?= $tampilc['users_id']; ?></li>
            <li>NIM= <?= $tampilc['nim']; ?></li>
        </ul>

        <form action="" method="post">
        <input type="hidden" name='id' value="<?= $tampilc['id']; ?>">
            <ul>Data yang mau diubah
                <li>
                    <label for="">Tanggal: </label>
                    <input type="datetime-local" name="tanggal" id="" required>
                </li>
                <li>
                    <label for="">Toilet id: </label>
                    <select name="toilet_id" id="">
                        <?php foreach($tolid as $ti) : ?>
                            <option value="<?= $ti['id']; ?>"><?= $ti['id']; ?> <?= $ti['lokasi']; ?></option>
                        <?php endforeach; ?>
                    </select>
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
                <li>
                    <label for="">User id: </label>
                    <select name="users" id="">
                        <?php foreach($userid as $ui) : ?>
                            <option value="<?= $ui['id']; ?>"><?= $ui['id']; ?> <?= $ui['username']; ?></option>
                        <?php endforeach; ?>
                    </select>

                </li>
                <li>
                    <label for="">NIM: </label>
                    <input type="text" name="nim" id="">
                </li>
                <button type="submit" name="ubahc">Ubah Checklist</button>
            </ul>
        </form>
    </div>
</body>
</html>