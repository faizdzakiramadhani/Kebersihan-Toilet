<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
require 'functions.php';
$id = $_GET['id'];

// ambil semua data mahasiswa
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];



// cek apakah data berhasil di tambahkan atau tidak
if(isset($_POST['kirim'])) {
    ubah($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah</title>
</head>
<body>
    <h1>ubah data mahasiswa</h1>
    <form action="" method="post">
        <!--menangkap id yang tersembunyi untuk dijadikan ubah-->
        <input type="hidden" name='id' value="<?= $mhs['id']; ?>">
        <ul>
            <li>
                <Label for='nama'>Nama: </Label>
                <input type="text" name='nama' id="nama" required value="<?= $mhs['nama']; ?>">
                <!--required = harus diisi tidak boleh kosong-->
            </li>
            <li>
                <Label for='nim'>NIM: </Label>
                <input type="text" name='nim' id="nim" required value="<?= $mhs['nim']; ?>">
                    <!--tambahin value untuk user melihat value dari databasenya agar bisa diubah-->
            </li>
            <li>
                <Label for='email'>Email: </Label>
                <input type="text" name='email' id="email" required value="<?= $mhs['email']; ?>">
            </li>
            <li>
                <Label for='jurusan'>Jurusan: </Label>
                <input type="text" name='jurusan' id="jurusan" required value="<?= $mhs['jurusan']; ?>">
            </li>
            <li>
                <button type='submit' name='kirim'>Ubah data</button>
            </li>
        </ul>
    </form>
</body>
</html>