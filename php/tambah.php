<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}

require 'functions.php';

if(isset($_POST['tambaht'])) {
    tambahchecklist($_POST);
}

if(isset($_POST['tambahc'])) {
    tambahtoilet($_POST);
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
<div class="tombform">
    <a href="index.php">Kembali</a>
    <button onclick="tampilTambahForm('toilet')">Tambah Data Toilet</button>
    <button onclick="tampilTambahForm('checklist')">Tambah Data Checklist</button>
</div>

    <div id="formChecklist" style="display: none;">
        <h2>Tambah Data Checklist</h2>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="">Tanggal: </label>
                    <input type="datetime-local" name="tanggal" id="" required>
                </li>
                <li>
                    <label for="">Toilet id: </label>
                    <input type="text" name="toilet_id" id="" required>
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
                    <label for="">users id: </label>
                    <input type="text" name="users" id="">
                </li>
                <li>
                    <label for="">nim: </label>
                    <input type="text" name="nim" id="">
                </li>
                <button type="submit" name="tambaht">Tambah Checklist</button>
            </ul>
        </form>
    </div>

    <div id="formToilet" style="display: none;">
        <h2>Tambah Data Toilet</h2>
        <form action="" method="post" style="display: block;">
            <ul>
                <li>
                    <label for="">Lokasi: </label>
                    <input type="text" name="lokasi" id="" required>
                </li>
                <li>
                    <label for="">Keterangan: </label>
                    <select name="keterangan" id="">
                        <option value=""></option>
                        <option value="Belum">Belum</option>
                        <option value="Sudah">Sudah</option>
                    </select>
                </li>
                <button type="submit" name="tambahc">Tambah Toilet</button>
            </ul>
        </form>
    </div>
    <script>
        function tampilTambahForm(tipe) {
            document.getElementById('formToilet').style.display = 'none';
            document.getElementById('formChecklist').style.display = 'none';

            if (tipe === 'toilet') {
                document.getElementById('formToilet').style.display = 'block';
            } else if (tipe === 'checklist') {
                document.getElementById('formChecklist').style.display = 'block';
        }
        }
    </script>
</body>
</html>