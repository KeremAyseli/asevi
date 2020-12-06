<?php
if(isset($_POST['Id'])&&isset($_POST['isim'])&&isset($_POST['soyisim'])) {

    require("Veritabanıİslemleri/veriTabanıSorgular.php");



    $baglantı = new mysqli("localhost", "root", null, "deneme");

    if ($baglantı->connect_errno) {
        die("Bağlantı Kurulamadı" . $baglantı->connect_error);
    }
    $id=mysqli_real_escape_string($baglantı,$_POST['Id']);
    $isim=mysqli_real_escape_string($baglantı,$_POST['isim']);
    $soyisim=mysqli_real_escape_string($baglantı,$_POST['soyisim']);
    echo $id." ".$isim." ".$soyisim;
    $ekleme=new veriTabanıSorgular();

    $ekleme->yeniKullanıcı($baglantı,$id,$isim,$soyisim,"deneme@gmail.com","12345deneme",2000,0);
}
else{
    echo '<DOCUTYPE html>
<meta charset="UTF-8">
<body>
<img src="./resimler/127982564_143738677101650_854130296549622953_n.jpg">
<a href="kayıtEkranı.html"><h3>yanlış veya eksik bilgi girdiniz.Kayıt ekranına dönmek için tıklayın.</h3></a>

</body>

';
}



function Sorgu($sorgu,$baglantı,$islemTipi){
    if($baglantı->query($sorgu)==true){
        echo "İŞLEM BAŞARIYLA YAPILDI".$islemTipi;

    }
    else{
        echo "İŞLEM YAPILAMADI".$baglantı->connect_error." ".$islemTipi;
    }
}
?>