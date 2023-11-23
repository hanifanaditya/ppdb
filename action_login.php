<?php
session_start();
include "libs/inc.php";

$user = new MUser();

$email = $_POST["email"];
$password = $_POST["password"];

// cek data user berdasarkan email
$sql = "SELECT * FROM tb_user WHERE EMAIL_USER = '$email";
$dtUser = $user->select($sql); // menampung data hasil eksekusi

// cek
if(count($dtUser)>0){
    $rsUser = $dtUser[0]; // menampung data jika user ditemukan
    if(md5($password)==$rsUser["password_user"]){
        // berhasil login
        $_SESSION["login"] = $rsUser;
        header("location:dashboard.php");
    } else{
        // jika password salah
        header("location:index.php?pesan=maaf password salah !");
    }
} else {
    // jika user salah atau data tidak ditemukan
    header("location:index.php?pesan=maaf email tidak ditemukan !");
}