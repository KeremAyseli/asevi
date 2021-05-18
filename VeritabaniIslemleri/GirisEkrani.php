<?php

include ("veriTabanıSorgular.php");
class GirisEkrani
{
  public $KullanıcıId;
  public $Eposta;
  public $Sifre;

    public function __construct($id)
    {
        $veriTabani=new veriTabanıSorgular();
        $sorugu="select * from girisekrani where KullanıcıId=$id";
       $gelenBilgiler= $veriTabani->VeriCekme($sorugu,"Kullanıcı bilgilerini öğrenme",$veriTabani->Baglnatı());
        $this->setKullanıcıId($gelenBilgiler["KullanıcıId"]);
        $this->setEposta($gelenBilgiler["EPosta"]);
        $this->setSifre($gelenBilgiler["Sifre"]);
    }

    /**
     * @return mixed
     */
    public function getKullanıcıId()
    {
        return $this->KullanıcıId;
    }

    /**
     * @param mixed $KullanıcıId
     */
    public function setKullanıcıId($KullanıcıId): void
    {
        $this->KullanıcıId = $KullanıcıId;
    }

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
        return $this->Sifre;
    }

    /**
     * @param mixed $Sifre
     */
    public function setSifre($Sifre): void
    {
        $this->Sifre = $Sifre;
    }


}