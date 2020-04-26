<?php
// Parameter untuk database MySQL
$host = "localhost"; // Nama host atau IP server
$user = "id9084465_ratono46";      // Username MySQL
$pass = "ratono46";          // Password MySQL
$name = "id9084465_ta";      // Nama database MySQL
 
// Baca parameter get  /simpandata.php?suhu=x <===
$asap = $_GET["asap"];
$suhu = $_GET["suhu"];
$kelembapan = $_GET["kelembapan"];
 
// Buat koneksi ke database MySQL
$conn = new mysqli($host, $user, $pass, $name);
 
// Periksa apakah koneksi sudah berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
 
// Perintah SQL untuk menyimpan data kepekatan asap ke tabel sensor tiga inputan
$sql = "INSERT INTO sensor (asap, suhu, kelembapan) VALUES ('$asap','$suhu','$kelembapan')";

 
// Jalankan dan periksa apakah perintah berhasil dijalankan
if ($conn->query($sql) === TRUE) {
    echo "Sukses - Tersimpan: ".$sensor1." dan ".$sensor2;
} else {
    echo "Error: ". $conn->error;
}
 
$conn->close();
?>


<?php
// Parameter untuk database MySQL
$host = "localhost"; // Nama host atau IP server
$user = "root";      // Username MySQL
$pass = "";          // Password MySQL
$name = "bendung";      // Nama database MySQL
 
// Baca parameter get  /simpan.php?tinggi_air=x <===
$tinggi_air = $_GET["tinggi_air"];
// $limpasan = $tinggi_air - 14;
// if ($limpasan < 0)
// {
// 	$limpasan = 0;
// }
// $level = ""; $pintu_1 = ""; $pintu_2 = ""; $pintu_3 = ""; $pintu_4 = "";

// if ($limpasan >= 0 && $limpasan < 2.5)
// {
// 	$level = "Aman";
// 	$pintu_1 = "Close";
// 	$pintu_2 = "Close";
// 	$pintu_3 = "Close";
// 	$pintu_4 = "Close";
// }
// else if ($limpasan >= 2.5 && $limpasan < 3.5)
// {
// 	$level = "Siaga";
// 	$pintu_1 = "Open";
// 	$pintu_2 = "Close";
// 	$pintu_3 = "Close";
// 	$pintu_4 = "Close";
// }
// else if ($limpasan >= 3.5 && $limpasan < 4)
// {
// 	$level = "Bahaya";
// 	$pintu_1 = "Open";
// 	$pintu_2 = "Open";
// 	$pintu_3 = "Close";
// 	$pintu_4 = "Close";
// }
// else if ($limpasan >= 4 && $limpasan < 4.5)
// {
// 	$level = "Bahaya";
// 	$pintu_1 = "Open";
// 	$pintu_2 = "Open";
// 	$pintu_3 = "Open";
// 	$pintu_4 = "Close";
// }
// else if ($limpasan >= 4.5)
// {
// 	$level = "Awas";
// 	$pintu_1 = "Open";
// 	$pintu_2 = "Open";
// 	$pintu_3 = "Open";
// 	$pintu_4 = "Open";
// }

// Buat koneksi ke database MySQL
$conn = new mysqli($host, $user, $pass, $name);
 
// Periksa apakah koneksi sudah berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
 
// Perintah SQL untuk menyimpan data suhu ke tabel sensor
// $sql = "INSERT INTO data_rekap (tinggi_air, limpasan_air, level, status_pintu_1, status_pintu_2, status_pintu_3, status_pintu_4) VALUES ('$tinggi_air', '$limpasan', '$level', '$pintu_1', '$pintu_2', '$pintu_3', '$pintu_4')";

$sql = "INSERT INTO data_rekap (tinggi_air) VALUES ('$tinggi_air')";
// Jalankan dan periksa apakah perintah berhasil dijalankan
if ($conn->query($sql) === TRUE) {
    echo "Sukses - Tersimpan : ".$tinggi_air;
} else {
    echo "Error: ". $conn->error;
}
 
$conn->close();
?>