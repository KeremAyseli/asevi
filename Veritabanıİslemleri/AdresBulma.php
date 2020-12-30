<?php

require ("Adresler.php");
require ("Ilceler.php");
require ("MahalleDurum.php");
require ("Sokaklar.php");
class AdresBulma
{
    public $Sehir;
    public $ilce;
    public $Mahalle;
    public $Sokak;

    /**
     * @return mixed
     */
    public function getSehir()
    {
        return $this->Sehir;
    }

    /**
     * @param mixed $Sehir
     */
    public function setSehir($Sehir): void
    {
        $this->Sehir = $Sehir;
    }

    /**
     * @return mixed
     */
    public function getIlce()
    {
        return $this->ilce;
    }

    /**
     * @param mixed $ilce
     */
    public function setIlce($ilce): void
    {

        $this->ilce = $ilce;
    }

    /**
     * @return mixed
     */
    public function getMahalle()
    {
        return $this->Mahalle;
    }

    /**
     * @param mixed $Mahalle
     */
    public function setMahalle($Mahalle): void
    {
        $this->Mahalle = $Mahalle;
    }

    /**
     * @return mixed
     */
    public function getSokak()
    {
        return $this->Sokak;
    }

    /**
     * @param mixed $Sokak
     */
    public function setSokak($Sokak): void
    {
        $this->Sokak = $Sokak;
    }

    public function __construct($id)
    {$sokak=new Sokaklar($id);
    $this->setSokak($sokak->getSokakIsmı());
    $mahalle=new Mahalleler($sokak->getMahalleId());
    $this->setMahalle($mahalle->getMahalleIsmı());
    $ilçe=new Ilceler($mahalle->getMahalleId());
    $this->setIlce($ilçe->getIlceIsim());
    $şehir=new Adresler($ilçe->getSehirId());
    $this->setSehir($şehir->getSehirIsmi());
    }


}