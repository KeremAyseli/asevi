<?php

require ("veriTabanıSorgular.php");
class Adresler
{

    public $SehirId;
    public $SehirIsmi;
    public $IlceId;
    public $MahalleId;
    public $SokakId;

    /**
     * @return mixed
     */
    public function getSehirId()
    {
        return $this->SehirId;
    }

    /**
     * @param mixed $SehirId
     */
    public function setSehirId($SehirId): void
    {
        $this->SehirId = $SehirId;
    }

    /**
     * @return mixed
     */
    public function getSehirIsmi()
    {
        return $this->SehirIsmi;
    }

    /**
     * @param mixed $SehirIsmi
     */
    public function setSehirIsmi($SehirIsmi): void
    {
        $this->SehirIsmi = $SehirIsmi;
    }

    /**
     * @return mixed
     */
    public function getIlceId()
    {
        return $this->IlceId;
    }

    /**
     * @param mixed $IlceId
     */
    public function setIlceId($IlceId): void
    {
        $this->IlceId = $IlceId;
    }

    /**
     * @return mixed
     */
    public function getMahalleId()
    {
        return $this->MahalleId;
    }

    /**
     * @param mixed $MahalleId
     */
    public function setMahalleId($MahalleId): void
    {
        $this->MahalleId = $MahalleId;
    }

    /**
     * @return mixed
     */
    public function getSokakId()
    {
        return $this->SokakId;
    }

    /**
     * @param mixed $SokakId
     */
    public function setSokakId($SokakId): void
    {
        $this->SokakId = $SokakId;
    }

    public function __construct($id)
    {
        $VeriTabani=new veriTabanıSorgular();
        $sorgu="select * from adresler where SehirId=$id";
     $gelenveriler=$VeriTabani->VeriCekme($sorgu,"Veri Çekme",$VeriTabani->Baglnatı());
        $this->setSehirId($gelenveriler["SehirId"]);
        $this->setSehirIsmi($gelenveriler["SehirIsmi"]);
        $this->setIlceId($gelenveriler["IlceId"]);
        $this->setMahalleId($gelenveriler["MahalleId"]);
        $this->setSokakId($gelenveriler["SokakId"]);
    }
    public function Guncelleme($id){
        $sorgu="update adresler set SehirIsmi=$this->SehirIsmi,
                IlceId=$this->IlceId,
                MahalleId=$this->MahalleId,
                SokakId=$this->SokakId 
                 where SehirId=$id";
        $guncelleme=new veriTabanıSorgular();
        $guncelleme->Degistirme($sorgu,"Güncelleme",$guncelleme->Baglnatı());

}

}