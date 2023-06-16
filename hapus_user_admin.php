<?php
include 'koneksi.php';
$idd = $_GET ['idd'];
mysqli_query ($conn, "DELETE FROM petugas WHERE id_petugas ='$idd'");
header ("location: user_admin.php");
?>