<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
require 'functions.php';
$id = $_GET['id'];

if( hapus($id) > 0) {
    echo '
        <script language="javascript">
            alert("data Berhasil diapus");
            document.location.href = "latihan1.php";
        </script>
    ';
} else {
    echo '
        <script language="javascript">
            alert("data gagal diapus");
            document.location.href = "latihan1.php";
        </script>
    ';
}

?>