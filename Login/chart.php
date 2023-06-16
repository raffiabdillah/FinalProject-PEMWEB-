<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['nama'])){
    header("location: index.php");
}else{
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CHART</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="header-area ">
            <div class="header-top_area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="../index.php">
                                        <img src="../img/logo pengaduan.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <i class="fa fa-home" style="color:white"><li><a class="active" href="mahasiswa_admin.php">Home</a></li></i>
                                            <i class="fa fa-bar-chart" style="color:white"><li><a class="active" href="pengaduan1.php">Pengaduan Saya</a></li></i>
                                            <i class="fa fa-bar-chart" style="color:white"><li><a class="active" href="chart.php">chart</a></li></i> 
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="search_button">
                                    </div>
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="logout.php" onclick="return confirm('Yakin Ingin Logout?')">Logout <i class="fa fa-sign-out"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="slider_area2">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3 style="color:white"> Web Pelaporan<br>
                                    Pengaduan mahasiswa</h3>
                                <p style="color:white">Selamat Datang di Web Pengaduan Mahasiswa<br>
                                Silahkan adukan Keluh Kesah anda terhadap Web Pengaduan Mahasiswa UPN "Veteran" Jawa Timur</p>
                                <div class="video_service_btn">
                                    <a href="#" class="boxed-btn3" style="text-transform: uppercase; font-size:15px"><i class="fa fa-user"> <?php echo $_SESSION['nama']?></i></a>
                                    <a href="pengaduan.php" class="boxed-btn3">Pengaduan disini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="project_area">
        <p class="tulisan_input2">Chart Pengaduan</p>
        <?php
        // Koneksi ke database untuk grafik pie
        $hostPie = 'localhost';
        $usernamePie = 'root';
        $passwordPie = '';
        $databasePie = 'pengaduan';

        $connPie = mysqli_connect($hostPie, $usernamePie, $passwordPie, $databasePie);

        // Cek koneksi
        if (!$connPie) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Query untuk mendapatkan data pengaduan berdasarkan status untuk grafik pie
        $queryPie = "SELECT status, COUNT(*) AS jumlah FROM pengaduan GROUP BY status";
        $resultPie = mysqli_query($connPie, $queryPie);

        $labelsPie = array();
        $dataPie = array();

        while ($row = mysqli_fetch_assoc($resultPie)) {
            $labelsPie[] = $row['status'];
            $dataPie[] = $row['jumlah'];
        }

        // Menutup koneksi ke database grafik pie
        mysqli_close($connPie);
        ?>

        <div class="chart-wrapper" style="display: flex; justify-content: center;">
            <div class="chart-container" style="width: 500px; height: 300px;">
                <canvas id="pieChart"></canvas>
            </div>
        </div>

    </div>

    <footer class="footer">
    </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">UPN "Veteran" Jawa Timur</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/ajax-form.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/imagesloaded.pkgd.min.js"></script>
    <script src="../js/scrollIt.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/nice-select.min.js"></script>
    <script src="../js/jquery.slicknav.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/gijgo.min.js"></script>
    <script src="../js/contact.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.form.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Menggambar grafik pie
        var pieData = {
            labels: <?php echo json_encode($labelsPie); ?>,
            datasets: [{
                data: <?php echo json_encode($dataPie); ?>,
                backgroundColor: [
                    '#ff7675',
                    '#74b9ff',
                    '#55efc4',
                    '#f1c40f',
                    '#e84393',
                    '#0984e3',
                ],
                borderColor: '#fff'
            }]
        };

        var pieOptions = {
            responsive: true
        };

        var pieChartCanvas = document.getElementById("pieChart").getContext("2d");
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        });
    </script>
</body>
</html>

<?php
} // Closing else statement
?>
