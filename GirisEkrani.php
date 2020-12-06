<?php
if(isset($_POST['Eposta'])&&$_POST['Sifre']) {
    require("Veritabanıİslemleri/veriTabanıSorgular.php");
    $eposta = $_POST['Eposta'];
    $sifre = $_POST['Sifre'];
    echo $sifre;
    $sorgular = new veriTabanıSorgular();
    $sorgu = "SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";
    $baglantı = new mysqli("localhost", "root", null, "deneme");

    $yonlendirme = $sorgular->girisYap($baglantı, $eposta, $sifre);
}

else{
    echo "neden boş lan";
}

?>