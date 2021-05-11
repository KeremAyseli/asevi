<?php
include($_SERVER["DOCUMENT_ROOT"] . "/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
$veriTabani = new veriTabanıSorgular();
$sonuc=$veriTabani->VeriCekme("select * from ".$_POST['TabloIsım'],"kayıt listeleme",$veriTabani->Baglnatı());
$gelenDegerler=array();
for($i=0;$i<count($sonuc);$i++){
    array_push($gelenDegerler,$sonuc[$i]);
}
echo json_encode($gelenDegerler,JSON_UNESCAPED_UNICODE);