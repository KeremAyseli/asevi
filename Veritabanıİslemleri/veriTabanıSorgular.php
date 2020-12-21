<?php


class veriTabanıSorgular
{
    function Baglnatı(){
        return $Baglnatı=new mysqli("localhost","root",null,"deneme");
    }
    /**
     * @param $id
     * @param $isim
     * @param $soyisim
     * @param $eposta
     * @param $sifre
     * @param $dogumGunu
     * @param $kullanıcıTipi
     * @param $profilResimAdres
     * VeriTabanına kullanıcı eklemeye yarayan fonksiyon.
     */
  function yeniKullanıcı($id,$isim,$soyisim,$eposta,$sifre,$dogumGunu,$kullanıcıTipi,$profilResimAdres){
   $id=mysqli_real_escape_string($this->Baglnatı(),$id);
   $isim=mysqli_real_escape_string($this->Baglnatı(),$isim);
   $soyisim=mysqli_real_escape_string($this->Baglnatı(),$soyisim);
   $eposta=mysqli_real_escape_string($this->Baglnatı(),$eposta);
   $sifre=mysqli_real_escape_string($this->Baglnatı(),$sifre);
   $dogumGunu=mysqli_real_escape_string($this->Baglnatı(),$dogumGunu);
   $kullanıcıTipi=mysqli_real_escape_string($this->Baglnatı(),$kullanıcıTipi);
   $profilResimAdres=mysqli_real_escape_string($this->Baglnatı(),$profilResimAdres);
      $uyelikTarihi=date("Y-m-d");

      $kisiEklemeSorgusu = "INSERT INTO kullanıcılar(Id,isim,soyisim,sifre,Eposta,dogumGunu,hesapTipi,uyelikTarihi,profilResmiAdres)VALUES( $id,'$isim','$soyisim','$sifre','$eposta',$dogumGunu,$kullanıcıTipi,'$uyelikTarihi','$profilResimAdres')";
       $this->Degistirme($kisiEklemeSorgusu,"KisiEkleme",$this->Baglnatı());
  }

    /**
     * @param $eposta
     * @param $sifre
     * Siteye giriş yapmaya sağlıyan fonksiyon.
     */
  function girisYap($eposta,$sifre){
      $sorgu="SELECT * from kullanıcılar WHERE sifre='$sifre' AND Eposta='$eposta'";

     $gelenDeger= $this->VeriDorulama($sorgu,"Giriş",$this->Baglnatı());
      if($gelenDeger==1){
          header("Location:./anasayfa.php");
      }
      else{
          header("Location:./GirisEkrani.php");
      }
  }

    /**
     * @param $sorgu
     * @param $islemTipi
     * @return int
     * Bu metot kayıt ekelemye yarar,eğer kayıt başarıyla eklenirse 1,eğer eklenmezse 0 değerini döndürür.
     */
    function Degistirme($sorgu, $islemTipi,$baglantı){
        if($baglantı->query($sorgu)==true){
            echo "İŞLEM BAŞARIYLA YAPILDI".$islemTipi;
            return 1;
        }
        else{
            echo "İŞLEM YAPILAMADI".$baglantı->connect_error." ".$islemTipi."<br>";
            return 0;
        }
    }

    /**
     * @param $sorgu
     * @param $islenTipi
     * @return int
     * Bu metot veri tabanında verinin olup olmadığını kontrol eder eğer varsa 1 yoksa 0 değerini döndürür.
     */
    function VeriDorulama($sorgu,$islenTipi,$baglantı){
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

    /**
     * @param $sorgu
     * @param $islenTipi
     * @return int
     * Veritabanında bulunan verileri çeker ve geri döndürür.Eğer bağlantı kurulmazsa fonksiyon çalışmaz hata verir,eğer bağlantı kurulursa ve sorgu çalışmazsa bu sefer de 0 değerinin geri döndürür,
     *eğer sıkıntısız çalışırsa tabloda olan verileri geri döndürür.
     */
    function VeriCekme($sorgu,$islenTipi,$baglantı){
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
    function Guncelleme($sorgu,$islemTipi){

    }
}