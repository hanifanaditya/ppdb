<?php

include "libs/inc.php";

$daftar = new MDaftar();
$id_daftar = $_GET["id"];

try {
    $daftar->Update($id_daftar,["status_daftar"=>$_GET["status"]]);
    header("location:form_daftar.php");
} catch(PDOException $err){
    header("location:form_daftar.php?pesan= gagal diserahkan");
}