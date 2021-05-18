<?php


class Mahalleler
{
   public $IlceId;
   public $MahalleId;
   public $MahalleIsmı;
   public $SponsorId;

    public function __construct($id)
    {
        $sorgu="select * from mahallerler where MahalleId=$id";
        $veriTabani=new veriTabanıSorgular();
       $gelenVeriler= $veriTabani->VeriCekme($sorgu,"Veri çekme",$veriTabani->Baglnatı());
       $this->setIlceId($gelenVeriler[0]["IlceId"]);
        $this->setMahalleId($gelenVeriler[0]["MahalleId"]);
        $this->setMahalleIsmı($gelenVeriler[0]["MahalleIsım"]);
        $this->setSponsorId($gelenVeriler[0]["SponsorId"]);

    }

    public function Guncelleme($id){
           $sorgu="update mahalleler set MahalleIsmı=$this->MahalleIsmı,  
                    MahalleIsmı=$this->MahalleIsmı,    
                      IlceId=$this->IlceId,       
                      SokakId=$this->SokakId,      
                      SponsorId=$this->SponsorId     
                      where MahalleId=$id ";
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
    public function getMahalleIsmı()
    {
        return $this->MahalleIsmı;
    }

    /**
     * @param mixed $MahalleIsmı
     */
    public function setMahalleIsmı($MahalleIsmı): void
    {
        $this->MahalleIsmı = $MahalleIsmı;
    }
    /**
     * @return mixed
     */
    public function getSponsorId()
    {
        return $this->SponsorId;
    }

    /**
     * @param mixed $SponsorId
     */
    public function setSponsorId($SponsorId): void
    {
        $this->SponsorId = $SponsorId;
    }



}