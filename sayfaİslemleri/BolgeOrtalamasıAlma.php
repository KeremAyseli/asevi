<?php
include ($_SERVER["DOCUMENT_ROOT"]."/asevi/VeriTabanıİslemleri/veriTabanıSorgular.php");

$veriTabani = new veriTabanıSorgular();
$sorgu = "SELECT avg(EvsizSayısı)as Evsiz ,avg(HayvanSayısı)as Hayvan,avg(YardımaIhtiyacıOlanAileler) as aileler,avg(OgrenciSayisi)as ogrenci from mahalledurum";
$geleneBilgiler=$veriTabani->VeriCekme($sorgu,"MahalleOrtalamaOgrenme",$veriTabani->Baglnatı());
echo round($geleneBilgiler[0]['Hayvan']);