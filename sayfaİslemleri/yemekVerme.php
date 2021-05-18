<?php
//*
//Yemek verme bilgilerini veritabanına kaydetmek için oluşturduğum script kodu.
//*//
include($_SERVER["DOCUMENT_ROOT"] . "/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
include($_SERVER['DOCUMENT_ROOT'] . "/asevi/Veritabanıİslemleri/YemekDagıtılanYerler.php");
if (!empty($_POST["adresler"]) && !empty($_POST["Ilceler"]) && !empty($_POST["Mahalleler"]) && !empty($_POST["sokakId"]) && !empty($_POST["yemekDagitanKisi"])) {
    echo "işlem başı";
    $sokakId = $_POST['sokakId'];
    $yemekDagitanKisiId = $_POST['yemekDagitanKisi'];

    $kayıtGirme = new YemekDagıtılanYerler();
    //O günün değerlerinin alınması
    $tarih= date("Y-m-d");
    //Yer ekleme methodunun çalıştırılması
    $kayıtGirme->YerEKle($sokakId, $yemekDagitanKisiId,$tarih);
    header("Location:../Yayın/yemekVerme.php");
} else {
    header("Location:../Yayın/yemekVerme.php");
} ?>

