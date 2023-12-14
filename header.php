<!-- library php -->
<?php
session_start();
// cek login
if(!isset($_SESSION["login"])){
    // jika tidak ada session login , maka di redirect
    header("location:index.php");
}
include "libs/inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    
    <!-- data table -->
    <link rel="stylesheet" href="assets/plugins/DataTables/DataTables-1.13.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/plugins/DataTables/Responsive-2.5.0/css/responsive.bootstrap5.min.css">

    <link rel="stylesheet" href="style.css">
    <!-- JQuery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Menampilkan overlay saat halaman dimuat
        var overlay = document.getElementById("overlay");
        overlay.style.display = "none";

        //  // Menyembunyikan overlay setelah waktu tertentu (Anda bisa menggantinya sesuai kebutuhan)
        // setTimeout(function() {
        //     overlay.style.display = "none";
        // }, 1500); // contoh: 2000 milidetik (2 detik)
        });
    </script>
</head>
<body>
    <!-- loader -->
    <div id="overlay">
        <!-- <div class="loader"></div> -->
        <div class="typing-indicator">
            <div class="typing-circle"></div>
            <div class="typing-circle"></div>
            <div class="typing-circle"></div>
            <div class="typing-shadow"></div>
            <div class="typing-shadow"></div>
            <div class="typing-shadow"></div>
        </div>
    </div>
    <!-- wrap dashboard -->
    <div id="dashboard">
        <div class="row g-0">
            <!-- side bar -->
            <div class="side-content col-md-2 min-vh-100 position-fixed">
                <div class="inner">
                    <div class="logo">
                        <img src="assets/images/logo.png" alt="">
                        <p>SMK MARYNOLL</p>
                    </div>
                    <div class="info-login">
                        <div class="d-flex">
                            <img src="assets/images/users.jpg" alt="">
                            <?php $auth = $_SESSION["login"]; ?>
                            <p>
                                <strong><?= $auth["nm_user"] ?> <small style="font-size: 12px; font-weight: 400; color: green;">(<?= $auth["level_user"] ?>)</small></strong><br>
                                <small><?= $auth["email_user"] ?></small>
                            </p>
                        </div>
                    </div>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php"><i class="fas fa-home"></i><span> Dashboard</span></a>
                    </li>
                    <!-- Tampil jika yang login user -->
                    <?php if($auth["level_user"]=="User"){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="form_daftar.php"><i class="fas fa-file-alt"></i><span> Formulir Pendaftaran</span></a>
                    </li>
                    <?php } ?>
                    <!-- emd menu user -->
                    <!-- tampil jika yang login admin -->
                    <?php if($auth["level_user"]=="Admin"){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="data_daftar.php"><i class="fas fa-table"></i><span> Data Pendaftaran</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_jurusan.php"><i class="fas fa-atlas"></i><span> Data Jurusan</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_user.php"><i class="fas fa-user"></i><span> Users</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="laporan.php"><i class="fas fa-print"></i><span> Laporan</span></a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="action_logout.php"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end side bar -->