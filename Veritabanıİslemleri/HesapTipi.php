<?php

require ("veriTabanıSorgular.php");
class HesapTipi
{
public $kullanıcıId;
public $hesapTipi;

    public function __construct($Id)
    {
        $veriTabaniBagalantısı=new veriTabanıSorgular();
        $sorgu="Select * from hesaptipleri where kullanıcıId='$Id'";
       $gelenBilgiler= $veriTabaniBagalantısı->VeriCekme($sorgu,"KullanıcıIdOgrenme");
        $this->setHesapTipi($gelenBilgiler["HesapTipi"]);
        $this->setKullanıcıId($gelenBilgiler["kullanıcıId"]);
    }


    /**
     * @return mixed
     */
    public function getKullanıcıId()
    {
        return $this->kullanıcıId;
    }

    /**
     * @param mixed $kullanıcıId
     */
    public function setKullanıcıId($kullanıcıId): void
    {
        $this->kullanıcıId = $kullanıcıId;
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

}