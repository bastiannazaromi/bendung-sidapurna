<!DOCTYPE html>
<html lang="en">
 <head>

    <title>Cetak PDF</title>

</head>
<style type="text/css">
 td {
  padding: 5px;
 }
</style>
<body  style="font-family:Times New Roman;font-size:12px">
	<center><h1>Data Rekap Kontrol Pintu Air</h1></center>
	<br><br><br>
	<table border="1">
		<tr>
			<th><center>No</center></th>
	        <th><center>Waktu</center></th>
	        <th><center>PIntu Air 1</center></th>
	        <th><center>PIntu Air 2</center></th>
	        <th><center>PIntu Air 3</center></th>
	        <th><center>PIntu Air Irigasi</center></th>
		</tr>
		<?php $no=1; foreach($record as $row){ ?>
		<tr>
			<td><center><?php echo $no++; ?></center></td>
			<td><center><?php echo $row->waktu ?></center></td>
			<td><center><?php echo $row->pintu_air_1 ?></center></td>
			<td><center><?php echo $row->pintu_air_2 ?></center></td>                                     
			<td><center><?php echo $row->pintu_air_3 ?></center></td>
			<td><center><?php echo $row->pintu_air_irigasi ?></center></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>