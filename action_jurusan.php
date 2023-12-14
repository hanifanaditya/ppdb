<?php

include "libs/inc.php";

$action = isset($_GET["ac"]) ? $_GET["ac"] : "";
$jurusan = new MJurusan(); // instance dari model jurusan Mjurusan

switch($action){
    case "add":
        //tambah data
        try {
            $jurusan->Insert([
                "nama_jurusan" => $_POST["nama_jurusan"],
                "pagu_jurusan" => $_POST["pagu_jurusan"],
                "status_jurusan" => $_POST["status_jurusan"],
            ]);
            header("location:data_jurusan.php?pesan=Data Berhasil Disimpan !");
        } catch(PDOException $err){
            header("location:form_jurusan.php?pesan=Data Gagal Disimpan !".$err->getMessage());
        }
        break;
    case "edit":
        //edit data
        try {
            $jurusan->Update(
                $_POST["id_jurusan"],
                [
                    "nama_jurusan" => $_POST["nama_jurusan"],
                    "pagu_jurusan" => $_POST["pagu_jurusan"],
                    "status_jurusan" => $_POST["status_jurusan"],
                ]
            );
            header("location:data_jurusan.php?pesan=Data Berhasil di Update !");
        } catch(PDOException $err){
            header("location:form_jurusan.php?pesan=Data Gagal di Update !".$err->getMessage());
        }
        break;
    case "delete":
        //hapus data
        try {
            $jurusan->Delete($_GET["id"]);
            header("location:data_jurusan.php?pesan=Data Berhasil di Hapus !");
        } catch(PDOException $err){
            header("location:data_jurusan.php?pesan=Data Gagal di Hapus !".$err->getMessage());
        }
        break;
    default:
        header("location:404.php");
        break;
}