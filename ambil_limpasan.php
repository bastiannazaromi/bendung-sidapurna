<?php
// Parameter untuk database MySQL
$host = "localhost"; // Nama host atau IP server
$user = "u659988286_ta";      // Username MySQL
$pass = "ta2019";          // Password MySQL
$name = "u659988286_ta";      // Nama database MySQL

$kirim = $_GET["kirim"];

$terima = $kirim;

$conn = new mysqli($host, $user, $pass, $name);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM data_rekap ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result) {
    $row   = $result->fetch_array(MYSQLI_ASSOC);
    $limpasan_air = $row["limpasan_air"];
}
echo $limpasan_air;
 
$conn->close();
?>