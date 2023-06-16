<?php
include 'koneksi.php';
$idd = $_GET['idd'];

// Menonaktifkan pengecekan kunci asing
mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS=0');

// Menghapus baris dari tabel "pengaduan"
mysqli_query($conn, "DELETE FROM pengaduan WHERE id_pengaduan = '$idd'");

// Mengaktifkan kembali pengecekan kunci asing
mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS=1');

header("location: data_pengaduan.php");
?>
