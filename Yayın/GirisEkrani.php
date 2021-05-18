<?php
session_start();
//*
//Giriş yapmayı sağlayan kodlar.
//*//
//Gelen değerler boş değilse yapılacak işlemler.
if (isset($_POST['Eposta']) && $_POST['Sifre']) {
    //veritabanı sorgular sınıfının include edilmesi
    include($_SERVER["DOCUMENT_ROOT"] . "/asevi/VeritabaniIslemleri/veriTabanıSorgular.php");
    $eposta = $_POST['Eposta'];
    $sifre = $_POST['Sifre'];
    //veritabanısorgular sınıfının tanımlanması
    $sorgular = new veriTabanıSorgular();
    //Yapılacak sorgu
    $sorgu = "SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";


//Sorgu sonucu gelen değerler
    $kullanıcıIdg = $sorgular->VeriCekme($sorgu, "KullanıcıIdOgrenme", $sorgular->Baglnatı());
    //Eğer gelen değerler boş değilse yapılacak işlemler
    if (!empty($kullanıcıIdg)) {
        echo "girisBasarılı";
        //SESSION listesine id değerinin tanımlanması
        $_SESSION["id"] = $kullanıcıIdg[0]["id"];
    }

}
//Gelen değerler boşsa yapılacak işlemler
else {
    echo "hatalı giriş";
}

