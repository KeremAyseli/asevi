<?php


class veriTabanıSorgular
{
    public $satırSayısı;

    /**
     * @param mixed $satırSayısı
     */
    public function setSatırSayısı($satırSayısı): void
    {
        $this->satırSayısı = $satırSayısı;
    }

    /**
     * @return mixed
     */
    public function getSatırSayısı()
    {
        return $this->satırSayısı;
    }
    function Baglnatı(){
        return $Baglnatı=new PDO("mysql:host=localhost;dbname=asevi", "root", null);
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

      $uyelikTarihi=date("Y-m-d");
      $kullanıcıDogumGunu=date($dogumGunu);
      $kisiEklemeSorgusu = "INSERT INTO kullanıcılar(id,isim,soyisim,sifre,Eposta,dogunGunu,hesapTipi,uyelikTarihi,profilResimAdresi)VALUES( $id,'$isim','$soyisim','$sifre','$eposta','$kullanıcıDogumGunu',$kullanıcıTipi,'$uyelikTarihi','$profilResimAdres')";
      $kayıtEkelemKontrol= $this->Degistirme($kisiEklemeSorgusu,"KisiEkleme",$this->Baglnatı());
      return $kayıtEkelemKontrol;
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
          header("Location:./login.html");
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

        $sonuc=$baglantı->query($sorgu);

        if($sonuc->rowCount()>0){
           $this->setSatırSayısı($sonuc->rowCount());
        return $sonuc->fetchAll();
        }
        else{
            return 0;
        }
    }
    function Guncelleme($sorgu,$islemTipi){

    }

}