<?php
if(isset($_POST['Id'])&&isset($_POST['isim'])&&isset($_POST['soyisim'])&&isset($_POST['eposta'])&&isset($_POST['dogumGunu'])&&isset($_POST['sifre'])&&isset($_FILES['resim'])) {
 $resimTur=$_FILES['resim']["type"];
 $resimTmpİsim=$_FILES['resim']['tmp_name'];
 $resimBoyut=$_FILES['resim']['size'];
 $resimDosyasıAdresi=$_SERVER['DOCUMENT_ROOT'].'/asevi/resimler/';
 $resimHedef=$resimDosyasıAdresi.basename($_FILES['resim']['name']);
 if($resimTur=="image/gif"||$resimTur=="image/png"
     ||$resimTur=="image/jpeg"||$resimTur=="image/jpg")
 {
     if($resimBoyut>(1024*1024*10)){
         echo "Dosya çok büyük";
     }
     else{
         move_uploaded_file($resimTmpİsim,$resimHedef);
     }
 }
    require($_SERVER["DOCUMENT_ROOT"]."/asevi/VeritabaniIslemleri/veriTabanıSorgular.php");
    require ($_SERVER["DOCUMENT_ROOT"]."/asevi/Yonlendirme/Yonlendirici.php");
    $id=$_POST['Id'];
    $isim=$_POST['isim'];
    $soyisim=$_POST['soyisim'];
    $eposta=$_POST['eposta'];
    $dogumGunu=$_POST['dogumGunu'];
    $sifre=$_POST['sifre'];
    $resim="../resimler/".$_FILES['resim']['name'];
    echo $id." ".$isim." ".$soyisim;
    $ekleme=new veriTabanıSorgular();
    $yonlendirme=new Yonlendirici();
  $kontrol= $ekleme->yeniKullanıcı($id,$isim,$soyisim,$eposta,$sifre,$dogumGunu,0,$resim);
  if($kontrol==1){
 $yonlendirme->anaSayfa();
  }
  else{
  $yonlendirme->kayıtEkranı();
  }
}
else{

}




?>