<?php

include "libs/inc.php";

$daftar = new MDaftar();
$id_daftar = $_GET["id"];

try {
    $daftar->Update($id_daftar,["verified_daftar"=>$_GET["verifikasi"]]);
    header("location:data_daftar.php?pesan=Data Berhasil di Verifikasi");
} catch(PDOException $err){
    header("location:data_daftar.php?pesan=gagal diserahkan");
}