<?php 
$conn = mysqli_connect("localhost","root","","db_checklist");

function query($query) {
    global $conn;
        // mengacu var conn di atas
    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    } 
    
    return $rows;
}
 
function tambahtoilet($data) {
    global $conn;
    $lokasi = htmlspecialchars($data['lokasi']);
    $ket = htmlspecialchars($data['keterangan']);

    $tambaht = "INSERT INTO toilet VALUE ('','$lokasi','$ket')";
    mysqli_query($conn, $tambaht);

    if(mysqli_affected_rows($conn)>0) {
        echo '<script>
        alert("data toilet berhasil ditambahkan");
        document.location.href = "index.php";
        </script>';
    }
}

function tambahchecklist($data) {
    global $conn;
    $tgl = htmlspecialchars($data['tanggal']);
    $toiletid = htmlspecialchars($data['toilet_id']);
    $kloset = htmlspecialchars($data['kloset']);
    $wastafel = htmlspecialchars($data['wastafel']);
    $lantai = htmlspecialchars($data['lantai']);
    $dinding = htmlspecialchars($data['dinding']);
    $kaca = htmlspecialchars($data['kaca']);
    $bau = htmlspecialchars($data['bau']);
    $sabun = htmlspecialchars($data['sabun']);
    $users = htmlspecialchars($data['users']);
    $nim = htmlspecialchars($data['nim']);

    try {
        $tambahdata = "INSERT INTO checklist VALUE ('','$tgl','$toiletid','$kloset','$wastafel','$lantai','$dinding','$kaca','$bau','$sabun','$users','$nim')";
        mysqli_query($conn, $tambahdata);
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
        
    }

    if(mysqli_affected_rows($conn)>0) {
        echo '<script>
        alert("data checklist berhasil ditambahkan");
        document.location.href = "index.php";
        </script>';
    }
}

function ubahtoilet($data) {
    global $conn;

    $id = $data['id'];
    $lokasi = htmlspecialchars($data['lokasi']);
    $ket = htmlspecialchars($data['keterangan']);

    $ubaht = "UPDATE toilet SET
    lokasi='$lokasi',
    keterangan='$ket'
    WHERE id=$id";
    var_dump($id);
    mysqli_query($conn, $ubaht);

    if(mysqli_affected_rows($conn)>0) {
        echo '<script>
        alert("data toilet berhasil diubah");
        document.location.href = "index.php";
        </script>';
    }
}

function ubahchecklist($data) {
    global $conn;

    $id = $data['id'];
    $tgl = htmlspecialchars($data['tanggal']);
    $toiletid = htmlspecialchars($data['toilet_id']);
    $kloset = htmlspecialchars($data['kloset']);
    $wastafel = htmlspecialchars($data['wastafel']);
    $lantai = htmlspecialchars($data['lantai']);
    $dinding = htmlspecialchars($data['dinding']);
    $kaca = htmlspecialchars($data['kaca']);
    $bau = htmlspecialchars($data['bau']);
    $sabun = htmlspecialchars($data['sabun']);
    $users = htmlspecialchars($data['users']);
    $nim = htmlspecialchars($data['nim']);

    $ubahc = "UPDATE checklist SET
    tanggal='$tgl',
    toilet_id='$toiletid',
    kloset='$kloset',
    wastafel='$wastafel',
    lantai='$lantai',
    dinding='$dinding',
    kaca='$kaca',
    bau='$bau',
    sabun='$sabun',
    users_id='$users',
    nim='$nim'
    WHERE id=$id";
    mysqli_query($conn, $ubahc);

    if(mysqli_affected_rows($conn)>0) {
        echo '<script>
        alert("data checklist berhasil diubah");
        document.location.href = "index.php";
        </script>';
    }
}

function hapustoilet($id) {
    global $conn;
    $hapust = "DELETE FROM toilet WHERE id = $id";
    mysqli_query($conn, $hapust);
    return mysqli_affected_rows($conn);
}

function hapuschecklist($id) {
    global $conn;
    $hapusc = "DELETE FROM checklist WHERE id = $id";
    mysqli_query($conn, $hapusc);
    return mysqli_affected_rows($conn);
}

function caritoilet($keyword) {
    global $conn;
    $query = "SELECT * FROM toilet where lokasi = '$keyword'";
    return query($query);
}

function carichecklist($keyword) {
    global $conn;
    $query = "SELECT * FROM checklist where nim LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data['username']));
        // stripslashes = hapus \ yang diketik user
        // strtolower = kata besar kecil jadi kecil
    $password = mysqli_real_escape_string($conn, $data['password']);
        // untuk memasukkan tanda kutipnya ke database secara aman 
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
 
    $nama = ($data['nama']);
    $email = ($data['email']);
    $status = ($data['status']);
    $role = ($data['role']);


    // cek username di database udah ada apa belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username= '$username'");

    if(mysqli_fetch_assoc($result)) {
            // jika true, eksekusi program dibawah
        echo '<script>
        alert("username sudah terdaftar");
        </script>';
        return false;
    } 

    // cek konfirmasi pass
    if($password !== $password2) {
        echo '<script language="javascript">
        alert("password tidak sesuai");</script>';
        return false;
            // untuk memberhentikan function nya dan program dibawahnya
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
        // param1 = var yang mau diacak, param2 = pengacaknya pake algoritma apa

    // masukkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUES ('','$username','$password', '$nama', '$email','$status','$role')");

    return mysqli_affected_rows($conn);
}

function nama($data) {
    global $conn;

    $nama = $data['nama'];
    return $nama;
}


?>