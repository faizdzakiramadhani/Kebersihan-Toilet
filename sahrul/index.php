<?php
include("koneksi.php");

$q = "";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = "WHERE tanggal LIKE '%".$q."%' or toilet_id LIKE '%".$q."%' or kloset LIKE '%".$q."%' or wastafel LIKE '%".$q."%' or lantai LIKE '%".$q."%' or dinding LIKE '%".$q."%' or sabun LIKE '%".$q."%' or bau LIKE '%".$q."%' or users_id LIKE '%".$q."%'" ;


}
$title = 'Checklist Toilet';
$sql = 'SELECT * FROM checklist ';
if (isset($sql_where))
    $sql .= $sql_where;
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Checklist Toilet</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body style="margin-top: 30px; background-color: #FFFFFF;">
    <div class="container" style="background-color: #000FFF; width: 250%; padding: 10px;">
        <br><br>
        <div class="head">
        <h1 style="color: #7eeef3;">Checklist Toilet</h1>
        <form>
            <div class="form-group" action="index.php" method="get" >
                <label for="q" style="color: #FFFFFF;">Cari Data Toilet</label>
                <input type="text" placeholder="Masukkan Pencarian"  id="q" name="q" class="input-q" value="<?php echo $q ?>">
                <button type="submit" name="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        </div>
        <div class="main">
            <table class="table table-striped table-hover">
            <tr>
                <th style="color: #7eeef3;">Tanggal</th>
                <th style="color: #7eeef3; width: 5%;">Kode Toilet</th>
                <th style="color: #7eeef3;">Kloset</th>
                <th style="color: #7eeef3;">Wastafel</th>
                <th style="color: #7eeef3;">Lantai</th>
                <th style="color: #7eeef3;">Dinding</th>
                <th style="color: #7eeef3;">Kaca</th>
                <th style="color: #7eeef3;">Bau</th>
                <th style="color: #7eeef3;">Sabun</th>
                <th style="color: #7eeef3;">Petugas</th>
                <th style="color: #7eeef3; width: 5%;">ID Barang</th>
                <th style="color: #7eeef3;">Aksi</th>
            </tr>
            <?php if($result): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td style="color: #7eeef3;"><?= $row['tanggal'];?></td>
                <td style="color: #7eeef3;"><?= $row['toilet_id'];?></td>
                <td style="color: #7eeef3;"><?= $row['kloset'];?></td>
                <td style="color: #7eeef3;"><?= $row['wastafel'];?></td>
                <td style="color: #7eeef3;"><?= $row['lantai'];?></td>
                <td style="color: #7eeef3;"><?= $row['dinding'];?></td>
                <td style="color: #7eeef3;"><?= $row['kaca'];?></td>
                <td style="color: #7eeef3;"><?= $row['bau'];?></td>
                <td style="color: #7eeef3;"><?= $row['sabun'];?></td>
                <td style="color: #7eeef3;"><?= $row['users_id'];?></td>
                <td style="color: #7eeef3;"><?= $row['id'];?></td>
                <td style="color: #7eeef3;">
                    <button class="btn" type="button" style="background-color: #09bcf3; width: 45%;"><a style="color: #FFFFFF;" href="ubah.php?id=<?= $row['id'];?>">Ubah Data</a></button> 
                    <button class="btn" type="button" style="background-color: #e4492e; width: 50%;"><a style="color: #FFFFFF;" href="hapus.php?id=<?= $row['id'];?>">Hapus Data</a></button>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td style="color: #7eeef3;" colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div><br><br><br>
        <div>
        <button class="btn" type="button" style="background-color: #07940e;"><a style="color: #7eeef3" href="tambah.php">Tambah Data Checklist</a></button>
        </div> <br>
        <div>
        <button class="btn" type="button" style="background-color: #07940e;"><a style="color: #FFFFFF" href="home.php">Kembali</a></button>
        </div>
    </div>
</body>
</html>