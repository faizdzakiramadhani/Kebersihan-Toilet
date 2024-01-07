<?php 
session_start();    // jalankan sessionnya

// kalau tidak login, ke login.php
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
    // order by = urutkan berdasarkan apa (ORDER BY id ASC(kebesar) dan ORDER BY id DESC(kekecil))
    // membuat search contoh where nama='nama siapa'

// tombol cari ditekan
if(isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
    // mencari apapun yang diketikan user
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head> 
<body>
    <a href="logout.php">Logout</a>
    <br>
    <h1>Daftar Mahasiswa</h1>
    <br>
    <a href="tambah.php">tambah data mahasiswa</a>
    <br>
    <br>
    <form action="" method="post">
        <input type="text" name='keyword' autocomplete="off" placeholder="masukkan nama pencariannya">
            <!--autocomplete=off agar sarannya hilang-->
        <button type='submit' name='cari'>cari</button>
    </form>
    <br>
    <table border="1" cellpadding='10' cellspacing='0'>
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            
            <td>
                <a href="ubah.php?id=<?= $row['id']; ?>">Ubah</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin?');">Hapus</a>
            </td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['jurusan']; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>
</html>