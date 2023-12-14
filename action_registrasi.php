<?php

include "libs/inc.php";

$email_user = $_POST['email'];

$user = new MUser();
$email = $_POST["email"];


// cek data user berdasarkan email
$sql = "SELECT * FROM tb_user WHERE email_user = '$email'";
$dtUser = $user->select($sql); // menampung data hasil eksekusi                                   

// cek
if(count($dtUser)>0){
    header("location:registrasi.php?pesan=Email Sudah Terdaftar !");
} else {
    // jika user salah atau data tidak ditemukan
    // simpan ke tb_user
    $user->Insert([
        "nm_user" => $_POST["nama"],
        "email_user" => $_POST["email"],
        "password_user" => md5($_POST["password"]),
        "level_user" => "User",
        "status" => 1
    ]);
    
    // redirect ke login
    header("location:index.php");
}