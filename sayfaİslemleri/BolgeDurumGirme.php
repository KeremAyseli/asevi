<?php
include($_SERVER["DOCUMENT_ROOT"] . "/asevi/VeriTabanıİslemleri/veriTabanıSorgular.php");
$sorgu="INSERT INTO `mahalledurum` (`MahalleId`, `EvsizSayısı`, `HayvanSayısı`, `YardımaIhtiyacıOlanAileler`, `OgrenciSayisi`) 
VALUES (".$_POST['MahalleId'].",".$_POST['EvsizSayısı'].",".$_POST['HayvanSayısı'].", ".$_POST['AileSayısı'].", ".$_POST['OgrenciSayısı'].")";
echo $sorgu;
$veriTabani=new veriTabanıSorgular();
echo $veriTabani->Degistirme($sorgu,"MahalleDurumu Girme",$veriTabani->Baglnatı());

