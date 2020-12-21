<?php
if(isset($_POST['Id'])&&isset($_POST['isim'])&&isset($_POST['soyisim'])&&isset($_POST['eposta'])&&isset($_POST['dogumGunu'])&&isset($_POST['sifre'])&&isset($_POST['resim'])) {

    require($_SERVER["DOCUMENT_ROOT"]."/Veritabanıİslemleri/veriTabanıSorgular.php");

    $id=$_POST['Id'];
    $isim=$_POST['isim'];
    $soyisim=$_POST['soyisim'];
    $eposta=$_POST['eposta'];
    $dogumGunu=$_POST['dogumGunu'];
    $sifre=$_POST['sifre'];
    $resim=$_POST['resim'];
    echo $id." ".$isim." ".$soyisim;
    $ekleme=new veriTabanıSorgular();
    $ekleme->yeniKullanıcı($id,$isim,$soyisim,$eposta,$sifre,$dogumGunu,0,$resim);
}
else{
    echo '<DOCUTYPE html>
<meta charset="UTF-8">
<body>
<img src="../resimler/127982564_143738677101650_854130296549622953_n.jpg">
<a href="kayıtEkranı.html"><h3>yanlış veya eksik bilgi girdiniz.Kayıt ekranına dönmek için tıklayın.</h3></a>

</body>

';
}




?>