<?php
// Parameter untuk database MySQL
$host = "localhost"; // Nama host atau IP server
$user = "u659988286_ta";      // Username MySQL
$pass = "ta2019";          // Password MySQL
$name = "u659988286_ta";      // Nama database MySQL
 
date_default_timezone_set("Asia/Jakarta");
$tanggal = date('Y-m-d H:i:s');
$jam_sekarang = date('H');
$hari_sekarang = date('d');
$bulan_sekarang = date('m');
$tahun_sekarang = date('Y');

// Baca parameter get  /simpan.php?tinggi_air=x <===
$tinggi_air = $_GET["tinggi_air"];
$limpasan = $tinggi_air - 7;

if ($limpasan < 0)
{
	$limpasan = 0;
}

if ($limpasan >= 0 && $limpasan <= 4)
{
	$level = "Normal";
	$pintu_1 = "Close";
	$pintu_2 = "Close";
	$pintu_3 = "Close";
}
else if ($limpasan >= 5 && $limpasan <= 6)
{
	$level = "Siap";
	$pintu_1 = "Open";
	$pintu_2 = "Close";
	$pintu_3 = "Close";
}
else if ($limpasan >= 7 && $limpasan <= 8)
{
	$level = "Siaga";
	$pintu_1 = "Open";
	$pintu_2 = "Open";
	$pintu_3 = "Close";
}
else if ($limpasan >= 9)
{
	$level = "Awas";
	$pintu_1 = "Open";
	$pintu_2 = "Open";
	$pintu_3 = "Open";
}

// Buat koneksi ke database MySQL
$conn = new mysqli($host, $user, $pass, $name);
 
// Periksa apakah koneksi sudah berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
 
// Perintah SQL untuk menyimpan data suhu ke tabel data_rekap
$sql = "INSERT INTO data_rekap (waktu, tinggi_air, limpasan_air, level, status_pintu_air_1, status_pintu_air_2, status_pintu_air_3) VALUES ('$tanggal', '$tinggi_air', '$limpasan', '$level', '$pintu_1', '$pintu_2', '$pintu_3')";

$sql2 = "SELECT * FROM kontroling ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql2);

if ($result) {
    $row   = $result->fetch_array(MYSQLI_ASSOC);
    $pintu_air_1  = $row["pintu_air_1"];
}

$sql3 = "SELECT * FROM data_rekap ORDER BY id DESC LIMIT 1";
$result2 = $conn->query($sql3);

if ($result2) {
    $row2   = $result2->fetch_array(MYSQLI_ASSOC);
    $tinggi_air_sebelumnya = $row2["tinggi_air"];
    $waktu = $row2["waktu"];
}

$waktu = strtotime($waktu);
$jam_lalu = date('H', $waktu);
$hari_lalu = date('d', $waktu);
$bulan_lalu = date('m', $waktu);
$tahun_lalu = date('Y', $waktu);

$selisih_jam = $jam_sekarang - $jam_lalu;
$selisih_hari = $hari_sekarang - $hari_lalu;
$selisih_bulan = $bulan_sekarang - $bulan_lalu;
$selisih_tahun = $tahun_sekarang - $tahun_lalu;

if ($tinggi_air_sebelumnya == $tinggi_air)
{
	if ($selisih_jam >= 1 || $selisih_hari >= 1 || $selisih_bulan >= 1 || $selisih_tahun >= 1)
	{
	    // Jalankan dan periksa apakah perintah berhasil dijalankan
		if ($conn->query($sql) === TRUE)
		{
	    	echo $pintu_air_1;
		}
		else
		{
		    echo "Error: ". $conn->error;
		}
	}
	else
	{
		echo $pintu_air_1;
	}
}
else
{
	// Jalankan dan periksa apakah perintah berhasil dijalankan
	if ($conn->query($sql) === TRUE)
	{
    	echo $pintu_air_1;
	}
	else
	{
	    echo "Error: ". $conn->error;
	}
}

$conn->close();
?>