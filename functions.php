<?php
// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'phpdasar');
    // ini variabel scope

/*
ambil data (fetch) mahasiswa dari objek $result
mysqli_fetch_row() = mengembalikan array numerik / angka, contoh var_dump($mhs[1]);
mysqli_fetch_assoc() = mengembalikan array asosiatif, contoh var_dump($mhs['nama']);
mysqli_fetch_array() = mengembalikan array numerik dan asosiatif, contoh var_dump($mhs['nama']);
mysqli_fetch_object()  = contoh var_dump($mhs->nama);
*/

/*
while( $mhs = mysqli_fetch_assoc($result) ) {
    var_dump($mhs['nama']);
};
*/

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

function tambah($data) {
    global $conn;
    // ambil data dari form
        // htmlspecialchars() = berguna jika user inputkan elemen html maka menjadi 
        // string bukan yang user inginkan
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    
    // query insert data
    $tambah_data = "INSERT INTO mahasiswa VALUE ('','$nama', '$nim', '$email', '$jurusan')";
    mysqli_query($conn, $tambah_data);

    if(mysqli_affected_rows($conn)>0) {
        echo '<script language="javascript">
        alert("data berhasil ditambahkan");
        document.location.href = "latihan1.php";
        </script>';
    }
}

function hapus($id) {
    global $conn;
    $hapus_data = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn, $hapus_data);
    return mysqli_affected_rows($conn);
}

function ubah($data) {  // nanti id tadi akan ditangkap lewat $data
    global $conn;
    
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    
    // query insert data
    $ubah_data = "UPDATE mahasiswa SET
    nama = '$nama',
    nim = '$nim',
    email = '$email',
    jurusan = '$jurusan'
    where id = $id";
    mysqli_query($conn, $ubah_data);

    if(mysqli_affected_rows($conn)>0) {
        echo '<script language="javascript">
        alert("data berhasil diubah");
        document.location.href = "latihan1.php";
        </script>';
    }
}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa where nama LIKE '%$keyword%'
    OR nim LIKE '%$keyword%'
    OR email LIKE '%$keyword%'
    OR jurusan LIKE '%$keyword%'";
        // cari berdasarkan nama atau nim atau email atau jurusan
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

    // cek username di database udah ada apa belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username= '$username'");

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
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");

    return mysqli_affected_rows($conn);
}

?>