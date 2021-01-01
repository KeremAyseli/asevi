<?php

session_start();
require ($_SERVER["DOCUMENT_ROOT"]."/asevi/Yonlendirme/Yonlendirici.php");
if (isset($_POST['Eposta']) && $_POST['Sifre']) {
    require($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
    $eposta = $_POST['Eposta'];
    $sifre = $_POST['Sifre'];
    echo $sifre;
    $sorgular = new veriTabanıSorgular();
    $sorgu = "SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";
    $kullanıcıIdGet="SELECT * from kullanıcılar WHERE Eposta='$eposta'";


     $yonlendirme = new Yonlendirici();
    $kullanıcıIdg=$sorgular->VeriCekme($kullanıcıIdGet,"KullanıcıIdOgrenme",$sorgular->Baglnatı());


    $_SESSION["id"]=$kullanıcıIdg["id"];
    echo $_SESSION["id"]." seasin";
    $_SESSION["hesapTipi"]=$kullanıcıIdg["hesapTipi"];
    echo $kullanıcıIdg["hesapTipi"];
    $yonlendirme->Giris($kullanıcıIdg["hesapTipi"],$sifre,$eposta);
} else {
    echo "neden boş lan";
}