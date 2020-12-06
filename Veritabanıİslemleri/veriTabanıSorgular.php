<?php


class veriTabanıSorgular
{
  function yeniKullanıcı($veriTabanıBaglantısı,$id,$isim,$soyisim,$eposta,$sifre,$dogumGunu,$kullanıcıTipi){
   $id=mysqli_real_escape_string($veriTabanıBaglantısı,$id);
   $isim=mysqli_real_escape_string($veriTabanıBaglantısı,$isim);
   $soyisim=mysqli_real_escape_string($veriTabanıBaglantısı,$soyisim);
   $eposta=mysqli_real_escape_string($veriTabanıBaglantısı,$eposta);
   $sifre=mysqli_real_escape_string($veriTabanıBaglantısı,$sifre);
   $dogumGunu=mysqli_real_escape_string($veriTabanıBaglantısı,$dogumGunu);
   $kullanıcıTipi=mysqli_real_escape_string($veriTabanıBaglantısı,$kullanıcıTipi);
      $uyelikTarihi=date("Y-m-d");

      $kisiEklemeSorgusu = "INSERT INTO kullanıcılar(Id,isim,soyisim,sifre,Eposta,dogumGunu,hesapTipi,uyelikTarihi)VALUES($id,'$isim','$soyisim','$sifre','$eposta',$dogumGunu,$kullanıcıTipi,'$uyelikTarihi')";
       $this->KullanıcıEkleme($kisiEklemeSorgusu,$veriTabanıBaglantısı,"KisiEkleme");
  }
  function girisYap($baglantı,$eposta,$sifre){
      $sorgu="SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";

     $gelenDeger= $this->VeriDorulama($sorgu,$baglantı,"Giriş");
      if($gelenDeger==1){
          header("Location:./anasayfa.html");
      }
      else{
          header("Location:./GirisEkranı.html");
      }
  }
    function KullanıcıEkleme($sorgu,$baglantı,$islemTipi){
        if($baglantı->query($sorgu)==true){
            echo "İŞLEM BAŞARIYLA YAPILDI".$islemTipi;
        }
        else{
            echo "İŞLEM YAPILAMADI".$baglantı->connect_error." ".$islemTipi;
        }
    }
    function VeriDorulama($sorgu,$baglantı,$islenTipi){
        if ($baglantı->connect_errno) {
            die("Bağlantı Kurulamadı" . $baglantı->connect_error);
        }
        $sonuc=$baglantı->query($sorgu);
        if($sonuc->num_rows>0){

            return 1;
        }
        else{
            return 0;
        }
    }
    function VeriCekme($sorgu,$baglantı,$islenTipi){
        if ($baglantı->connect_errno) {
            die("Bağlantı Kurulamadı" . $baglantı->connect_error);
        }
        $sonuc=$baglantı->query($sorgu);
        if($sonuc->num_rows>0){

            while ($satırlar=$sonuc->fetch_assoc()){
                return $satırlar;
            }

        }
        else{
            return 0;
        }
    }
}