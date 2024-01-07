<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
require 'functions.php';
/*
if(isset($_POST['kirim'])) {
    // ambil data dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    
    // query insert data
    $tambah_data = "INSERT INTO mahasiswa VALUE ('','$nama', '$nim', '$email', '$jurusan')";
    mysqli_query($conn, $tambah_data);
    
    // cek apakah data berhasil di tambahkan atau tidak
    if(mysqli_affected_rows($conn)>0) {
        echo '<script language="javascript">alert("Berhasil ditambahkan")</script>';
    } 
}
*/

// atau

// cek apakah data berhasil di tambahkan atau tidak
if(isset($_POST['kirim'])) {
    tambah($_POST);
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
</head>
<body>
    <h1>tambah data mahasiswa</h1>
    <form action="" method="post">
        <!--action dikosongkan karna ketika tombol kirim ditekan datanya dikirimnya disini-->
        <ul>
            <li>
                <Label for='nama'>Nama: </Label>
                <input type="text" name='nama' id="nama" required>
                <!--required = harus diisi tidak boleh kosong-->
            </li>
            <li>
                <Label for='nim'>NIM: </Label>
                <input type="text" name='nim' id="nim" required>
            </li>
            <li>
                <Label for='email'>Email: </Label>
                <input type="text" name='email' id="email" required>
            </li>
            <li>
                <Label for='jurusan'>Jurusan: </Label>
                <input type="text" name='jurusan' id="jurusan" required>
            </li>
            <li>
                <button type='submit' name='kirim'>Tambah data</button>
            </li>
        </ul>
    </form>
</body>
</html>