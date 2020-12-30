<?php


class KullanıcıProfil
{
    public $id;
    public $isim;
    public $soyisim;
    public $dogumGunu;
    public $Eposta;
    public $sifre;
    public $hesapTipi;
    public $profilFotografı;

    /**
     * @return mixed
     */
    public function getEposta()
    {
        return $this->Eposta;
    }

    /**
     * @param mixed $Eposta
     */
    public function setEposta($Eposta): void
    {
        $this->Eposta = $Eposta;
    }

    /**
     * @return mixed
     */
    public function getSifre()
    {
        return $this->sifre;
    }

    /**
     * @param mixed $sifre
     */
    public function setSifre($sifre): void
    {
        $this->sifre = $sifre;
    }

    /**
     * @return mixed
     */
    public function getHesapTipi()
    {
        return $this->hesapTipi;
    }

    /**
     * @param mixed $hesapTipi
     */
    public function setHesapTipi($hesapTipi): void
    {
        $this->hesapTipi = $hesapTipi;
    }

    /**
     * @return mixed
     */
    public function getProfilFotografı()
    {
        return $this->profilFotografı;
    }

    /**
     * @param mixed $profilFotografı
     */
    public function setProfilFotografı($profilFotografı): void
    {
        $this->profilFotografı = $profilFotografı;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIsim()
    {
        return $this->isim;
    }

    /**
     * @param mixed $isim
     */
    public function setIsim($isim): void
    {
        $this->isim = $isim;
    }

    /**
     * @return mixed
     */
    public function getSoyisim()
    {
        return $this->soyisim;
    }

    /**
     * @param mixed $soyisim
     */
    public function setSoyisim($soyisim): void
    {
        $this->soyisim = $soyisim;
    }

    /**
     * @return mixed
     */
    public function getDogumGunu()
    {
        return $this->dogumGunu;
    }

    /**
     * @param mixed $dogumGunu
     */
    public function setDogumGunu($dogumGunu): void
    {
        $this->dogumGunu = $dogumGunu;
    }

    /**
     * @return mixed
     */
    public function getUyelikTarihi()
    {
        return $this->uyelikTarihi;
    }

    /**
     * @param mixed $uyelikTarihi
     */
    public function setUyelikTarihi($uyelikTarihi): void
    {
        $this->uyelikTarihi = $uyelikTarihi;
    }
    public $uyelikTarihi;
     function __construct($id)
     {
         $kullanıcıSorgulama=new veriTabanıSorgular();
         $sorgu="Select * from kullanıcılar where Id=$id";

       $kullanıcıBilgileri=  $kullanıcıSorgulama->VeriCekme($sorgu,"Kisi arama",$kullanıcıSorgulama->Baglnatı());

         $this->setIsim($kullanıcıBilgileri["isim"]);
         $this->setSoyisim($kullanıcıBilgileri["soyisim"]);
         $this->setDogumGunu($kullanıcıBilgileri["dogunGunu"]);
         $this->setSifre($kullanıcıBilgileri["sifre"]);
         $this->setEposta($kullanıcıBilgileri["Eposta"]);
         $this->setUyelikTarihi(date("d-m-Y",strtotime($kullanıcıBilgileri["uyelikTarihi"])));
         $this->setProfilFotografı($kullanıcıBilgileri["profilResimAdresi"]);
         $this->setHesapTipi($kullanıcıBilgileri["hesapTipi"]);

     }
     function Guncelleme($id){
         $sorgu="UPDATE kullanıcılar SET isim='$this->isim',soyisim='$this->soyisim',sifre='$this->sifre',Eposta='$this->Eposta',dogumGunu='$this->dogumGunu',hesapTipi='$this->hesapTipi',
                        uyelikTarihi='$this->uyelikTarihi',profilResmiAdres='$this->profilFotografı' WHERE Id='$id'";
         $veritabanı=new veriTabanıSorgular();
         echo "<br>".$sorgu."<br>";
         $veritabanı->Degistirme($sorgu,"Güncelleme",$veritabanı->Baglnatı());
     }
}