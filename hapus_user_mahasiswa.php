<?php
include 'koneksi.php';
$id = $_GET['id'];

// Delete related rows in the "pengaduan" table first
mysqli_query($conn, "DELETE FROM pengaduan WHERE npm = '$id'");

// Delete the row from the "mahasiswa" table
mysqli_query($conn, "DELETE FROM mahasiswa WHERE npm = '$id'");

header("location: user_mahasiswa.php");
?>
