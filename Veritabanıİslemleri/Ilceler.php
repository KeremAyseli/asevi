<?php

class Ilceler
{
public $IlceId;
public $IlceIsim;
public $SehirId;




    public function __construct($id)
    {
        $sorgu="select * from ilceler where IlceId=$id";
        $veriTabanı=new veriTabanıSorgular();
        $gelenVeriler=$veriTabanı->VeriCekme($sorgu,"Veri çekme",$veriTabanı->Baglnatı());
        $this->setIlceId($gelenVeriler[0]["IlceId"]);
        $this->setIlceIsim($gelenVeriler[0]["IlceIsım"]);
        $this->setSehirId($gelenVeriler[0]["SehirId"]);
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


}