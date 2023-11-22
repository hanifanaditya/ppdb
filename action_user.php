<?php

include "libs/inc.php";

$action = isset($_GET["ac"]) ? $_GET["ac"] : "";
$user = new MUser(); // instance dari model user MUser

switch($action){
    case "add":
        //tambah data
        try {
            $user->Insert([
                "nm_user" => $_POST["nm_user"],
                "email_user" => $_POST["email_user"],
                "password_user" => md5($_POST["password_user"]),
                "level_user" => $_POST["level_user"],
                "status" => $_POST["status"],
            ]);
            header("location:data_user.php?pesan=Data Berhasil Disimpan !");
        } catch(PDOException $err){
            header("location:form_user.php?pesan=Data Gagal Disimpan !".$err->getMessage());
        }
        break;
    case "edit":
        //edit data
        try {
            $user->Update(
                $_POST["id_user"],
                [
                    "nm_user" => $_POST["nm_user"],
                    "email_user" => $_POST["email_user"],
                    "password_user" => $_POST["password_user"]=="" ? $_POST["old_user"] : md5($_POST["password_user"]),
                    "level_user" => $_POST["level_user"],
                    "status" => $_POST["status"],
                ]
            );
            header("location:data_user.php?pesan=Data Berhasil di Update !");
        } catch(PDOException $err){
            header("location:form_user.php?pesan=Data Gagal di Update !".$err->getMessage());
        }
        break;
    case "delete":
        //hapus data
        try {
            $user->Delete($_GET["id"]);
            header("location:data_user.php?pesan=Data Berhasil di Hapus !");
        } catch(PDOException $err){
            header("location:data_user.php?pesan=Data Gagal di Hapus !".$err->getMessage());
        }
        break;
    default:
        header("location:404.php");
        break;
}