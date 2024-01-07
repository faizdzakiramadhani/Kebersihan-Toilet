<?php 
session_start();    // jalankan sessionnya

// kalau tidak login, ke login.php
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
require 'functions.php';
// $namauser = $_GET['namauser']; untuk selamat datang

$checklist = query("SELECT * FROM checklist");
$toilet = query("SELECT * FROM toilet");

if(isset($_POST['carichecklist'])) {
    $caric = carichecklist($_POST['keyword']);
    // mencari apapun yang diketikan user
}
if(isset($_POST['caritoilet'])) {
    $carit = caritoilet($_POST['keyword']);
    // mencari apapun yang diketikan user
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Selamat Datang, <?= $_SESSION['nama']; ?></h1>

    <h2>Checklist</h2>
    <a href="tambah.php">Tambah</a>
    <form action="" method="post" hidden>
        <input type="text" name="keyword" id="" autocomplete="off" placeholder="masukkan nim">
        <button type="submit" name="carichecklist">Cari</button>
    </form>

    <table border="1" cellpadding='10' cellspacing='0'>
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Tanggal</th>
            <th>toilet id</th>
            <th>kloset</th>
            <th>wastafel</th>
            <th>lantai</th>
            <th>dinding</th>
            <th>kaca</th>
            <th>bau</th>
            <th>sabun</th>
            <th>NIM</th>
            
        </tr>
        <?php $i=1; ?>
        <?php foreach($checklist as $cek) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubahc.php?id=<?= $cek['id']; ?>">Ubah</a> <a href="hapus.php?id=<?= $cek['id']; ?>">Hapus</a>
            </td>
            <td><?= $cek['tanggal']; ?></td>
            <td><?= $cek['toilet_id']; ?></td>
            <td><?= $cek['kloset']; ?></td>
            <td><?= $cek['wastafel']; ?></td>
            <td><?= $cek['lantai']; ?></td>
            <td><?= $cek['dinding']; ?></td>
            <td><?= $cek['kaca']; ?></td>
            <td><?= $cek['bau']; ?></td>
            <td><?= $cek['sabun']; ?></td>
            <td><?= $cek['nim']; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>

    <h2>Toilet</h2>
    <a href="tambah.php">Tambah</a>
    <form action="" method="post" hidden>
        <input type="text" name="keyword" id="" autocomplete="off" placeholder="masukkan lokasi">
        <button type="submit" name="caritoilet">Cari</button>
    </form>

    <table border="1" cellpadding='10' cellspacing='0'>
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Kode toilet</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach($toilet as $t) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><a href="ubaht.php?id=<?= $t['id']; ?>">Ubah</a> <a href="hapus.php?id=<?= $t['id']; ?>">Hapus</a></td>
          
            <td><?= $t['id']; ?></td>
            <td><?= $t['lokasi']; ?></td>
            <td><?= $t['keterangan']; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>

    
</body>
</html>