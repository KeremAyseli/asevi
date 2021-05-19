<?php
//*
//Konumbulma.js sınıfından değerleri cevaplama için bu script dosyasını oluşturdum
//*//
include("/asevi/VeritabaniIslemleri/veriTabanıSorgular.php");
$veriTabani = new veriTabanıSorgular();
if(empty($_POST['Id']))
{
$sonuc=$veriTabani->VeriCekme("select * from ".$_POST['TabloIsım'],"kayıt listeleme",$veriTabani->Baglnatı());
$gelenDegerler=array();
for($i=0;$i<count($sonuc);$i++){
    array_push($gelenDegerler,$sonuc[$i]);
}
echo json_encode($gelenDegerler,JSON_UNESCAPED_UNICODE);
}
if(!empty($_POST['Id']))
{
    $sonuc=$veriTabani->VeriCekme("select * from ".$_POST['TabloIsım']." where ".$_POST['UstTablo']."=".$_POST['Id'],"kayıt listeleme",$veriTabani->Baglnatı());

    $gelenDegerler=array();
    for($i=0;$i<count($sonuc);$i++){
        array_push($gelenDegerler,$sonuc[$i]);
    }
    //Bulunan veriler json olarak ekrana basılması
    echo json_encode($gelenDegerler,JSON_UNESCAPED_UNICODE);
}