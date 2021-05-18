<?php
//*
//Giriş yapmak için oluşturduğumuz ekran
//*//
//Session başlatma
session_start();
//Yonlendirici sınıfının eklenmesi
require ($_SERVER["DOCUMENT_ROOT"]."/asevi/Yonlendirme/Yonlendirici.php");
//Gelen değerler boş değilse yapılacak işlemler
if (isset($_POST['Eposta']) && $_POST['Sifre']) {
    //veritabanısorgular sınıfının eklenmesi
    require($_SERVER["DOCUMENT_ROOT"]."/asevi/VeritabaniIslemleri/veriTabanıSorgular.php");
    $eposta = $_POST['Eposta'];
    $sifre = $_POST['Sifre'];
    echo $sifre;
    //veritabanısorgular sıfının çalışması
    $sorgular = new veriTabanıSorgular();
    $sorgu = "SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";
    $kullanıcıIdGet="SELECT * from kullanıcılar WHERE Eposta='$eposta'";


     $yonlendirme = new Yonlendirici();
     //Kullanıcının Id değerini öğrenme
    $kullanıcıIdg=$sorgular->VeriCekme($kullanıcıIdGet,"KullanıcıIdOgrenme",$sorgular->Baglnatı());

    //sessıon id değerine gelen idnin atılması
    $_SESSION["id"]=$kullanıcıIdg[0]["id"];
    $_SESSION["hesapTipi"]=$kullanıcıIdg[0]["hesapTipi"];
    //Giriş yapma metodu
    $yonlendirme->Giris($kullanıcıIdg[0]["hesapTipi"],$sifre,$eposta);
} else {
    echo "neden boş lan";
}