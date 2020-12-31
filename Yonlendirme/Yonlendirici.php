<?php


class Yonlendirici
{
function Giris($hesapTipi,$sifre,$eposta){
    $veriTabanı=new veriTabanıSorgular();
    $sorgu="SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";

    $gelenDeger= $veriTabanı->VeriDorulama($sorgu,"Giriş",$veriTabanı->Baglnatı());
    if($gelenDeger==1){
        if($hesapTipi==1){
            header("Location:../admin/adminPanel.php");
        }
        if($hesapTipi==0){
            header("Location:../Yayın/anasayfa.php");
        }

    }
    else{
        header("Location:./login.html");
    }

}
function anaSayfaH(){
    header("Location:./anasayfa.html");
}
    function anaSayfaP(){
        header("Location:./anasayfa.php");
    }
function kayıtEkranı(){
    header("Location:./kayıtEkranı.html");
}
}