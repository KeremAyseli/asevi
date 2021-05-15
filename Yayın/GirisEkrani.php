<?php
session_start();

if (isset($_POST['Eposta']) && $_POST['Sifre']) {
    include($_SERVER["DOCUMENT_ROOT"] . "/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
    $eposta = $_POST['Eposta'];
    $sifre = $_POST['Sifre'];
    echo $sifre;
    $sorgular = new veriTabanıSorgular();
    $sorgu = "SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";
    $kullanıcıIdGet = "SELECT Id from kullanıcılar WHERE Eposta='$eposta'";


    $yonlendirme = $sorgular->girisYap($eposta, $sifre);
    $kullanıcıIdg = $sorgular->VeriCekme($sorgu, "KullanıcıIdOgrenme", $sorgular->Baglnatı());
    $_SESSION["id"] = $kullanıcıIdg[0]["id"];
    echo $_SESSION["id"] . " seasin";

} else {
    echo "neden boş lan";
}

