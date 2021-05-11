<?php
include($_SERVER["DOCUMENT_ROOT"] . "/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
include ($_SERVER['DOCUMENT_ROOT']."/asevi/Veritabanıİslemleri/YemekDagıtılanYerler.php");
if($_POST['sokakId']!=null&&$_POST['yemekDagıtanKisi']!=null){
    echo "işlem başı";
    $sokakId=$_POST['sokakId'];
    $yemekDagıtanKisiId=$_POST['yemekDagıtanKisi'];

    $kayıtGirme=new YemekDagıtılanYerler();
    $kayıtGirme->YerEKle($sokakId,$yemekDagıtanKisiId);
   header("Location:../Yayın/yemekVerme.php");
}
else{
    header("Location:../Yayın/yemekVerme.php");
} ?>