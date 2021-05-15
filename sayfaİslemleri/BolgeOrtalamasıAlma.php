<?php
include($_SERVER["DOCUMENT_ROOT"] . "/asevi/VeriTabanıİslemleri/veriTabanıSorgular.php");

$veriTabani = new veriTabanıSorgular();
$sorgu = "SELECT avg(EvsizSayısı)as Evsiz ,avg(HayvanSayısı)as Hayvan,avg(YardımaIhtiyacıOlanAileler) as aileler,avg(OgrenciSayisi)as ogrenci from mahalledurum where MahalleId=".$_POST['MahalleId'];
$geleneBilgiler = $veriTabani->VeriCekme($sorgu, "MahalleOrtalamaOgrenme", $veriTabani->Baglnatı());
echo json_encode(
    array("Evsiz" => round($geleneBilgiler[0]['Evsiz']),
        "Hayvan" => round($geleneBilgiler[0]['Hayvan']),
        "aileler" => round($geleneBilgiler[0]['aileler']),
        "ogrenci" => round($geleneBilgiler[0]['ogrenci'])
    ));