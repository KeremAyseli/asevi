<?php
//*
//Dağıtılan yemeği kaldırmak için bu kodu kullanıyoruz.
//
//*//
echo $banlanacakId=$_POST['ID'];
include ($_SERVER["DOCUMENT_ROOT"]."/asevi/VeritabaniIslemleri/veriTabanıSorgular.php");
$veritabanı=new veriTabanıSorgular();
$IdbanlamaSorgusu="delete from yemekdagıtılanyerler where id=$banlanacakId";
$kisiBan=$veritabanı->Degistirme($IdbanlamaSorgusu,"Banlama",$veritabanı->Baglnatı());