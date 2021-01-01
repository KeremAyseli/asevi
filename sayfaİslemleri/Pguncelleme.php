<?php
require($_SERVER["DOCUMENT_ROOT"] . "/Veritabanıİslemleri/KullanıcıProfil.php");

$veriTabanı=new KullanıcıProfil(17);
echo "Onceki sifre".$veriTabanı->getSifre();
$veriTabanı->setSifre($_POST["sifre"]);
echo "Sonraki Sifre".$veriTabanı->getSifre();
$veriTabanı->Guncelle(17);