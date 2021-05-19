<?php
//*
//Kayıt olmayı sağlayan ekranın kodları
//*//
//Gelen değerler boş değilse yapılacak işlemler
if(!empty($_POST['isim'])&&!empty($_POST['soyisim'])&&!empty($_POST['eposta'])&&!empty($_POST['dogumGunu'])&&!empty($_POST['sifre'])) {

    require("/asevi/VeritabaniIslemleri/veriTabanıSorgular.php");
    require ("/asevi/Yonlendirme/Yonlendirici.php");
    //sesssionların başlatılması
    session_start();
    $isim=$_POST['isim'];
    $soyisim=$_POST['soyisim'];
    $eposta=$_POST['eposta'];
    $dogumGunu=$_POST['dogumGunu'];
    $sifre=$_POST['sifre'];
    $_SESSION['KayıtId']=$_POST['eposta'];
    $ekleme=new veriTabanıSorgular();
    $yonlendirme=new Yonlendirici();
    //veritabanı sorgular sınıfında olan yeniKullanıcı metodunun kullanılması
  $kontrol= $ekleme->yeniKullanıcı($isim,$soyisim,$eposta,$sifre,$dogumGunu,0);
  //Kayıt işlemi başarılı olursa yapılacaklar
  if($kontrol==1){
      echo "kayıtBAŞARILI";

  }
  //Kayıt işlemi başarılı olmazsa yapılacakalar
  else{
      echo "KAYIT BAŞARISIZ";

  }
}
else{
    var_dump($_POST);
echo "başrısız";
}




?>