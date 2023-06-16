<?php
session_start();
include 'koneksi.php';
if(!isset ($_SESSION['level'])){
	header ("location: index.php");
	}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<style type="text/css">
.head {
	width:100%;
	height:100px;
	border-bottom:1px solid;
	}
</style>
<div class="head">
<table>
<tr>
<td width="10%"><img src="img/logoupnbaru.png" width="80px" /></td>
<td align="center" width="90%"><font style="font-size:22px; font-family:Arial, Helvetica, sans-serif;">PENGADUAN TINDAK KEJAHATAN<br />MAHASISWA<br/>UPN "VETERAN" JAWA TIMUR</font><br /><i><font style="font-size:15px;">Jl. Rungkut Madya No.1, Gn. Anyar, Kec. Gn. Anyar, Surabaya, Jawa Timur 60294</font></i></td>
</tr>
</table>
</div><br /><br />
<div style="font-size:24px; text-align:center;">Laporan User Mahasiswa</div><br /><br />
<table align="center" border="1" cellpadding="8" cellspacing="0">
<tr>
			<th>No</th>
			<th>Nama</th>
			<th>NPM</th>
			<th>Jenis Kelamin</th>
            <th>Fakultas</th>
            <th>Program Studi</th>
			<th>No_Telp</th>
		</tr>
<?php
$no = 1;
$query = mysqli_query ($conn, "SELECT * FROM mahasiswa");
if (mysqli_num_rows ($query)){
while ($data = mysqli_fetch_array ($query)) {
?>
<tr align="left">
<tr>
<td><?php echo $no++ ?></td>
<td><?php echo $data['No'] ?></td>
<td><?php echo $data['Nama'] ?></td>
<td><?php echo $data['NPM'] ?></td>
<td><?php echo $data['Jenis Kelamin'] ?></td>
<td><?php echo $data['Fakultas'] ?></td>
<td><?php echo $data['Program Studi'] ?></td>
</tr>
<?php }}else{
	echo '<tr><td colspan="6" align="center">TIDAK ADA DATA</td></tr>';
}?>
</table>
<br/>
<table class="titik">
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surabaya,.........................<script>document.write(new Date().getFullYear());</script></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KEPALA PUSAT BANTUAN UPN "Veteran" Jawa Timur.</td>
</tr>
</table>
<br/><br/><br/><br/>
<table class="titik">
<tr>
<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>. . . . . . . . . . . . . . . . . . . . . .</u></b></td>
</tr>
</table>
<script>
window.print() 
</script>
</body>
</html>
<?php } ?>