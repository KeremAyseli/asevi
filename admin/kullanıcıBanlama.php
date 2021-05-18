<?php
//*
//Kişiyi siteden silmek için bu kodları kullanıyoruz.
//*//
echo $banlanacakId=$_POST['ID'];
include ($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
$veritabanı=new veriTabanıSorgular();
$IdbanlamaSorgusu="delete from kullanıcılar where id=$banlanacakId";
$kisiBan=$veritabanı->Degistirme($IdbanlamaSorgusu,"Banlama",$veritabanı->Baglnatı());