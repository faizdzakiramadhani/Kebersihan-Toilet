database = data didalam dbms
dbms = software pengelola database management system

tabel mahasiswa di mysql id=1, nama=davin; id=2, nama=rian
AUTO_INCREMENT pada id otomatis mengisi jadi user tidak perlu mengisinya
jika id=2 diapus, dan kita tambahin maka id barunya jadi 3 walaupun isi tabelnya ada 1
bukan urutan seperti No. pada tabel umumnya

input submit untuk html 4
button submit untuk html 5

mysql ada celah keamanannya sehingga bisa diretas, max versi 4
mysqli tertutup keamanannya sehingga TIDAK bisa diretas, bisa versi paling tinggi

--ERROR--
Unknown column '$id' in 'where clause' di mysql_query()
Masalahnya terletak pada penggunaan kutip tunggal ('). Anda dapat menggunakan kutip ganda (") atau menggunakan konkatenasi(kali titik) untuk menggabungkan variabel ke dalam string. Berikut adalah contoh:
1. kutip ganda
$hapus_data = "DELETE FROM mahasiswa WHERE id = $id";
mysqli_query($conn, $hapus_data);
1. Menggunakan Konkatenasi(kali titik):
$hapus_data = 'DELETE FROM mahasiswa WHERE id = ' . $id;
mysqli_query($conn, $hapus_data);

session = user yang udah proses login maka masuk halaman yang sudah diatur session
sampai nilainya hilang dalam 1 sesi misal menutup browser lalu buka lagi atau laptop direstart

bedanya </tag> dan <tag/>:
</tag> = memiliki tag 2 bagian dan tag yang memiliki elemen konten <html>...</html>
<tag/> = memiliki 1 bagian dan tag yang  tidak memiliki elemen konten <input/>

digunakan jika memasukkan html ke php
<?php if/while/foreach(): ?>
    <p></p>
<?php end if/while/foreach ?> 