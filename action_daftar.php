<?php

include "libs/inc.php";

$daftar = new MDaftar();

try {
    // generato NO Pendaftaran
    $nextid = $daftar->select("SHOW TABLE STATUS LIKE 'tb_daftar'");
    $id = sprintf("%04d",$nextid[0]["Auto_increment"]);
    $no_daftar = "P1".date("dm").$id;

    // cek file syarat
    if($_FILES["syarat_daftar"]["name"]!=""){
        $loc_upload = "syarat/".basename("syarat_".$_POST["nisn"].".pdf");
        $type = strtolower(pathinfo($_FILES["syarat_daftar"]["name"],PATHINFO_EXTENSION));

        // validasi
        if($type!="pdf"){
            header("location:form_daftar.php?pesan=Maaf jenis file salah !");
            exit;
        }

        if($_FILES["syarat_daftar"]["size"]>1500000){
            header("location:form_daftar.php?pesan=Maaf ukuran file maximal 1.5 mb !");
            exit;
        }

        // proses upload
        if(!move_uploaded_file($_FILES["syarat_daftar"]["tmp_name"], $loc_upload)){
            // jika tidak berhasil upload
            // redirect ke form daftar
            header("location:form_daftar.php?pesan=Data gagal disimpan , karena file gagal di upload");
            exit;
        }
    }

    // simpan ke tb_daftar
    if($_POST["id_daftar"]==""){
        $daftar->Insert([
            "id_user" => $_POST["id_user"],
            "no_daftar" => $no_daftar,
            "nisn" => $_POST["nisn"],
            "tgl_daftar" => date("Y-m-d"),
            "nm_daftar" => $_POST["nm_daftar"],
            "tmp_lahir_daftar" => $_POST["tmp_lahir_daftar"],
            "tgl_lahir_daftar" => date("Y-m-d",strtotime($_POST["tgl_lahir_daftar"])),
            "alamat_daftar" => $_POST["alamat_daftar"],
            "jk_daftar" => $_POST["jk_daftar"],
            "agama_daftar" => $_POST["agama_daftar"],
            "telp_daftar" => $_POST["telp_daftar"],
            "asal_sekolah_daftar" => $_POST["asal_sekolah_daftar"],
            "nilai_daftar" => $_POST["nilai_daftar"],
            "id_jurusan" => $_POST["id_jurusan"],
            "nm_ayah_daftar" => $_POST["nm_ayah_daftar"],
            "nm_ibu_daftar" => $_POST["nm_ibu_daftar"],
            "syarat_daftar" =>"syarat_".$_POST["nisn"].".pdf",
            "verified_daftar" => 0,
            "status_daftar" => 0
        ]);
    } else {
        $daftar->Update(
            $_POST["id_daftar"],
            [
                "nisn" => $_POST["nisn"],
                "tmp_lahir_daftar" => $_POST["tmp_lahir_daftar"],
                "tgl_lahir_daftar" => date("Y-m-d",strtotime($_POST["tgl_lahir_daftar"])),
                "alamat_daftar" => $_POST["alamat_daftar"],
                "jk_daftar" => $_POST["jk_daftar"],
                "agama_daftar" => $_POST["agama_daftar"],
                "telp_daftar" => $_POST["telp_daftar"],
                "asal_sekolah_daftar" => $_POST["asal_sekolah_daftar"],
                "nilai_daftar" => $_POST["nilai_daftar"],
                "id_jurusan" => $_POST["id_jurusan"],
                "nm_ayah_daftar" => $_POST["nm_ayah_daftar"],
                "nm_ibu_daftar" => $_POST["nm_ibu_daftar"],
                "syarat_daftar" =>"syarat_".$_POST["nisn"].".pdf"
            ]
        );
    }

    // redirect ke login
    header("location:form_daftar.php");
    
} catch(PDOException $err){
    // redirect ke form
    header("location:form_daftar.php?pesan=Data gagal disimpan !");
}