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


    $_SESSION["id"]=$kullanıcıIdg[0]["id"];
    $_SESSION["hesapTipi"]=$kullanıcıIdg[0]["hesapTipi"];
    $yonlendirme->Giris($kullanıcıIdg[0]["hesapTipi"],$sifre,$eposta);
} else {
    echo "neden boş lan";
}