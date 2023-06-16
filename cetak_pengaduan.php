<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['level'])) {
    header("location: index.php");
    exit;
} else {
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Pengaduan</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div class="head">
        <table>
            <tr>
                <td width="10%"><img src="img/logoupnbaru.png" width="80px" /></td>
                <td align="center" width="90%"><font style="font-size:22px; font-family:Arial, Helvetica, sans-serif;">PENGADUAN TINDAK KEJAHATAN<br />MAHASISWA<br/>UPN "VETERAN" JAWA TIMUR</font><br /><i><font style="font-size:15px;">Jl. Rungkut Madya No.1, Gn. Anyar, Kec. Gn. Anyar, Surabaya, Jawa Timur 60294</font></i></td>
            </tr>
        </table>
    </div>
    <br /><br />
    <div style="font-size:24px; text-align:center;">Laporan Pengaduan Mahasiswa</div>
    <br /><br />
	<table align="center" border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Tanggal Pengaduan</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>NPM</th>
        <th>Isi Laporan</th>
        <th>Foto</th>
        <th>Status</th>
    </tr>
    <?php
    $no = 1;
    $id_pengaduan = isset($_POST['tgl_pengaduan']) ? mysqli_real_escape_string($conn, $_POST['tgl_pengaduan']) : '';
    $query = mysqli_query($conn, "SELECT * FROM pengaduan WHERE tgl_pengaduan >= '$id_pengaduan'");
    
    if ($query !== false) {
        if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr align="left">
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['tgl_pengaduan'] ?></td>
                    <td><?php echo $data['nama_pengadu'] ?></td>
                    <td><?php echo $data['jenis_kelamin'] ?></td>
                    <td><?php echo $data['npm'] ?></td>
                    <td><?php echo $data['isi_laporan'] ?></td>
                    <td><a href="#/<?php echo $data['foto']; ?>"><img src="image/<?php echo $data['foto']; ?>" height="55px"></a></td>
                    <td><?php echo $data['status'] ?></td>
                </tr>
            <?php
            }
        } else {
            echo '<tr><td colspan="8" align="center">Tidak ada data yang ditemukan.</td></tr>';
        }
    } else {
        echo 'Terjadi kesalahan dalam menjalankan query.';
    }
    ?>
</table>
    <br/>
    <table class="titik">
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surabaya,.........................<script>document.write(new Date().getFullYear());</script></td>
        </tr>
        <tr>    
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Pusat Pengaduan</td>
        </tr>
    </table>
    <br/><br/><br/><br/>
    <table class="titik">
        <tr>
            <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>. . . . . . . . . . . . . . . . . . . . . .</u></b></td>
        </tr>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>
<?php } ?>
