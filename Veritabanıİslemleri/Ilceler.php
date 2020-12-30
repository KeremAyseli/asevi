<?php


class Ilceler
{
public $IlceId;
public $IlceIsim;
public $SehirId;
public $MahalleId;
public $SokakId;

    public function __construct($id)
    {
        $sorgu="select * from ilceler where IlceId=$id";
        $veriTabanı=new veriTabanıSorgular();
        $gelenVeriler=$veriTabanı->VeriCekme($sorgu,"Veri çekme",$veriTabanı->Baglnatı());
        $this->setIlceId($gelenVeriler["IlceId"]);
        $this->setIlceIsim($gelenVeriler["IlceIsım"]);
        $this->setSehirId($gelenVeriler["SehirId"]);
        $this->setMahalleId($gelenVeriler["MahalleId"]);
        $this->setSokakId($gelenVeriler["SokakId"]);
    }
    public function Guncelleme($id){
        $sorgu="update ilceler set IlceIsım=$this->IlceIsim,
                SehirId=$this->SehirId,
                MahalleId=$this->MahalleId,
                SokakId=$this->SokakId
                where IlceId=$id";
        $guncelleme=new veriTabanıSorgular();
        $guncelleme->Degistirme($sorgu,"Güncelleme",$guncelleme->Baglnatı());
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
    public function getIlceIsim()
    {
        return $this->IlceIsim;
    }

    /**
     * @param mixed $IlceIsim
     */
    public function setIlceIsim($IlceIsim): void
    {
        $this->IlceIsim = $IlceIsim;
    }

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
}