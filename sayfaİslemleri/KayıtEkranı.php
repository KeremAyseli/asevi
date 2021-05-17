<?php
if(!empty($_POST['isim'])&&!empty($_POST['soyisim'])&&!empty($_POST['eposta'])&&!empty($_POST['dogumGunu'])&&!empty($_POST['sifre'])) {

    require($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
    require ($_SERVER["DOCUMENT_ROOT"]."/asevi/Yonlendirme/Yonlendirici.php");
    session_start();
    $isim=$_POST['isim'];
    $soyisim=$_POST['soyisim'];
    $eposta=$_POST['eposta'];
    $dogumGunu=$_POST['dogumGunu'];
    $sifre=$_POST['sifre'];
    $_SESSION['KayıtId']=$_POST['eposta'];
    $ekleme=new veriTabanıSorgular();
    $yonlendirme=new Yonlendirici();
  $kontrol= $ekleme->yeniKullanıcı($isim,$soyisim,$eposta,$sifre,$dogumGunu,0);
  if($kontrol==1){
      echo "kayıtBAŞARILI";

  }
  else{
      echo "KAYIT BAŞARISIZ";

  }
}
else{
    var_dump($_POST);
echo "başrısız";
}




?>