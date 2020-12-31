<?php
$banlanacakId=$_POST['banId'];
$yemekKaldırma=$_POST['banYemek'];
require ($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
session_start();
$veritabanı=new veriTabanıSorgular();
$IdbanlamaSorgusu="delete from kullanıcılar where id=$banlanacakId";

$kisiBan=$veritabanı->Degistirme($IdbanlamaSorgusu,"Banlama",$veritabanı->Baglnatı());

$YemekKaldırma="delete from yemekdagıtılanyerler where id=$yemekKaldırma";
$_SESSION['durum']=false;
$yemekBan=$veritabanı->Degistirme($YemekKaldırma,"Yemek kaldırma",$veritabanı->Baglnatı());
if($yemekBan==1||$kisiBan==1){
    $_SESSION['durum']=true;
    header("Location:adminPanel.php");
}
else{
    $_SESSION['durum']=false;
    header("Location:adminPanel.php");
}
?>
