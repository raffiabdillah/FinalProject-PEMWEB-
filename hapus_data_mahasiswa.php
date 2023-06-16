<?php
include 'koneksi.php';
$id = $_GET ['id'];
mysqli_query ($conn, "DELETE FROM data_mahasiswa WHERE id_mahasiswa ='$id'");
header ("location: data_mahasiswa.php");
?>