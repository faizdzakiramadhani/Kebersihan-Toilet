<?php 
require 'functions.php';
$id = $_GET['id'];

if( hapustoilet($id) > 0) {
    echo '
        <script language="javascript">
            alert("data Berhasil diapus");
            document.location.href = "login.php";
        </script>
    ';
} else {
    echo '
        <script language="javascript">
            alert("data berhasil diapus");
            document.location.href = "login.php";
        </script>
    ';
}

//  ==== 

if( hapuschecklist($id) > 0) {
    echo '
        <script language="javascript">
            alert("data Berhasil diapus");
            document.location.href = "login.php";
        </script>
    ';
} else {
    echo '
        <script language="javascript">
            alert("data berhasil diapus");
            document.location.href = "login.php";
        </script>
    ';
}
?>