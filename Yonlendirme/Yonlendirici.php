<?php


class Yonlendirici
{
//Anasayfaya yönlendirme kodu
    function anaSayfa()
    {
        header("Location:../Yayın/anasayfa.php");
    }

    //Kayıt Ekranı  yönlendirme kodu
    function kayıtEkranı()
    {
        header("Location:../Yayın/kayıtEkranı.html");
    }
}