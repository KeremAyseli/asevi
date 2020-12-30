<?php


class Yonlendirici
{
function Giris($hesapTipi){
    if($hesapTipi==1){
        header("Location:../Yayın/adminPanel.php");
    }
    if($hesapTipi==0){
        header("Location:../Yayın/anasayfa.php");
    }
}
function anaSayfa(){
    header("Location:./anasayfa.php");
}
function kayıtEkranı(){
    header("Location:./kayıtEkranı.html");
}
}