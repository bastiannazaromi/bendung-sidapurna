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
	<center><h1>Data Rekap Bendung Sidapurna</h1></center>
	<br><br><br>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Ketinggian Air</th>
			<th>Limpasan Air</th>
			<th>Level</th>
			<th>Status Pintu Air 1</th>                             
			<th>Status Pintu Air 2</th>
			<th>Status Pintu Air 3</th>
		</tr>
		<?php $no=1; foreach($record as $row){ ?>
		<tr>
			<td><center><?php echo $no++; ?></center></td>
			<td><center><?php echo $row->waktu ?></center></td>
			<td><center><?php echo $row->tinggi_air ?></center></td>
			<td><center><?php echo $row->limpasan_air ?></center></td>                                     
			<td><center><?php echo $row->level ?></center></td>
			<td><center><?php echo $row->status_pintu_air_1 ?></center></td>
			<td><center><?php echo $row->status_pintu_air_2 ?></center></td>
			<td><center><?php echo $row->status_pintu_air_3 ?></center></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>