<?php

include("Adresler.php");
include("Ilceler.php");
include("MahalleDurum.php");
include("Sokaklar.php");
include("Mahalleler.php");
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
    {
        $sokak=new Sokaklar($id);
    $this->setSokak($sokak->getSokakIsmı());

    $mahalle=new Mahalleler($sokak->getMahalleId()[0]);
    $this->setMahalle($mahalle->getMahalleIsmı());

    $ilçe=new Ilceler($mahalle->getIlceId()[0]);
    $this->setIlce($ilçe->getIlceIsim());

    $şehir=new Adresler($ilçe->getSehirId());
    $this->setSehir($şehir->getSehirIsmi());


    }


}