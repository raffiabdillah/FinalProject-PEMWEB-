<?php 
include 'koneksi.php';
$id = $_GET ['id'];
$p = mysqli_query ($conn, "SELECT * FROM pengaduan WHERE id_pengaduan = '$idd'");
$data = mysqli_fetch_array ($p);
?>
<?php
if (isset($_POST['simpan'])){
	$id = $_POST ['id'];
	$tgl = $_POST ['tgl'];
	$nama = $_POST ['nama'];
	$NPM = $_POST ['NPM'];
	$isi = $_POST ['isi'];
	$tlp = $_POST ['tlp'];
	$foto = $_POST ['foto'];
	$st = $_POST ['status'];
	$edit = mysqli_query ($conn, "UPDATE pengaduan SET id_pengaduan='$id',tgl_pengaduan='$tgl',nama_pengadu='$nama',NPM='$NPM',isi_laporan='$isi',tlp='$tlp',foto='$foto',status='$st' WHERE id_pengaduan ='$idd'");
	if($edit){
		?>
        <script type="text/javascript">
		document.location.href="data_pengaduan_petugas.php";
		</script>
        <?php
		}else{
		?>
        <script type="text/javascript">
		document.location.href="data_pengaduan_petugas.php";
		</script>
        <?php
		}
		}