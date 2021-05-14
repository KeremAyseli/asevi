<?php


class Yonlendirici
{
function Giris($hesapTipi,$sifre,$eposta){
    $veriTabanı=new veriTabanıSorgular();
    $sorgu="SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";

    $gelenDeger= $veriTabanı->VeriDorulama($sorgu,"Giriş",$veriTabanı->Baglnatı());
    if($gelenDeger){
        if($hesapTipi==1){
            header("Location:../admin/adminPanel.php");
        }
        if($hesapTipi==0){
            header("Location:../Yayın/anasayfa.php");
        }

    }
    else{
        header("Location:../Yayın/login.html");
    }

}

    function anaSayfa(){
        header("Location:../Yayın/anasayfa.php");
    }
function kayıtEkranı(){
    header("Location:../Yayın/kayıtEkranı.html");
}
}