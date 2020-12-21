<?php
session_start();

if (isset($_POST['Eposta']) && $_POST['Sifre']) {
    require($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
    $eposta = $_POST['Eposta'];
    $sifre = $_POST['Sifre'];
    echo $sifre;
    $sorgular = new veriTabanıSorgular();
    $sorgu = "SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";
    $kullanıcıIdGet="SELECT id from kullanıcılar WHERE Eposta='$eposta'";


   $yonlendirme = $sorgular->girisYap( $eposta, $sifre);
    $kullanıcıIdg=$sorgular->VeriCekme($kullanıcıIdGet,"KullanıcıIdOgrenme");

    $_SESSION["id"]=$kullanıcıIdg["id"];
    echo $_SESSION["id"]." seasin";

} else {
    echo "neden boş lan";
}

