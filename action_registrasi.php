<?php

include "libs/inc.php";

$user = new MUser();

try {
    // simpan ke tb_user
    $user->Insert([
        "nm_user" => $_POST["nama"],
        "email_user" => $_POST["email"],
        "password_user" => $_POST["password"],
        "level_user" => "User",
        "status" => 1
    ]);

    // redirect ke login
    header("location:index.php");

} catch(PDOException $err){
    // redirect ke form
    header("location:registrasi.php?pesan=Registrasi Gagal !");
}