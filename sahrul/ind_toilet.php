<?php
include("koneksi.php");

$q = "";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = "WHERE keterangan LIKE '%".$q."%' or lokasi LIKE '%".$q."%'";
}
$title = 'Toilet';
$sql = 'SELECT * FROM toilet ';
if (isset($sql_where))
    $sql .= $sql_where;
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cheklist Toilet</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body style="margin-top: 30px; background-color: #ffffff;">
    <div class="container" class="container" style="background-color: #000FFF; width: 50%; padding: 30px;">
        <br><br>
        <div class="head">
        <h1 style="color: #FFFFFF;">Data Toilet</h1>
        <form>
            <div class="form-group" action="" method="get" >
                <label for="q" style="color: #FFFFFF;">Cari Data Toilet</label>
                <input type="text" placeholder="Masukkan Pencarian"  id="q" name="q" class="input-q" value="<?php echo $q ?>">
                <button type="submit" name="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        </div>
        <div class="main">
            <table class="table table-striped table-hover">
            <tr>
                <th style="color: #FFFFFF;">Kode Toilet</th>
                <th style="color: #FFFFFF;">Lokasi Toilet</th>
                <th style="color: #FFFFFF;">Keterangan</th>
                <th style="color: #FFFFFF;">Aksi</th>
            </tr>
            <?php if($result): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td style="color: #FFFFFF;"><?= $row['id'];?></td>
                <td style="color: #FFFFFF;"><?= $row['lokasi'];?></td>
                <td style="color: #FFFFFF;"><?= $row['keterangan'];?></td>
                <td style="color: #FFFFFF;">
                    <button class="btn" type="button" style="background-color: #e4492e; width: 70%;"><a style="color: #FFFFFF;" href="hap_toilet.php?id=<?= $row['id'];?>">Hapus Data</a></button>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td style="color: #FFFFFF;" colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div><br><br><br>
        <div>
        <button class="btn" type="button" style="background-color: #07940e;"><a style="color: #FFFFFF" href="tam_toilet.php">Tambah Data Toilet</a></button>
        </div> <br>
        <div>
        <button class="btn" type="button" style="background-color: #07940e;"><a style="color: #FFFFFF" href="home.php">Kembali</a></button>
        </div>
    </div>
</body>
</html>