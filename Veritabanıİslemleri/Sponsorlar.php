<?php

include ("Veritabanıİslemleri/veriTabanıSorgular.php");
class Sponsorlar
{
public $sponsorId;
public $sponsorIsim;
public $SponsorResimAdresi;
public $SponsorBilgileri;

    /**
     * @return mixed
     */
    public function getSponsorId()
    {
        return $this->sponsorId;
    }

    /**
     * @param mixed $sponsorId
     */
    public function setSponsorId($sponsorId): void
    {
        $this->sponsorId = $sponsorId;
    }

    /**
     * @return mixed
     */
    public function getSponsorIsim()
    {
        return $this->sponsorIsim;
    }

    /**
     * @param mixed $sponsorIsim
     */
    public function setSponsorIsim($sponsorIsim): void
    {
        $this->sponsorIsim = $sponsorIsim;
    }

    /**
     * @return mixed
     */
    public function getSponsorResimAdresi()
    {
        return $this->SponsorResimAdresi;
    }

    /**
     * @param mixed $SponsorResimAdresi
     */
    public function setSponsorResimAdresi($SponsorResimAdresi): void
    {
        $this->SponsorResimAdresi = $SponsorResimAdresi;
    }

    /**
     * @return mixed
     */
    public function getSponsorBilgileri()
    {
        return $this->SponsorBilgileri;
    }

    /**
     * @param mixed $SponsorBilgileri
     */
    public function setSponsorBilgileri($SponsorBilgileri): void
    {
        $this->SponsorBilgileri = $SponsorBilgileri;
    }

    public function __construct($Id)
    {
        $veriTabani=new veriTabanıSorgular();
        $sorgu="Select * from sponsorlar where SponsorId='$Id'";
       $Bilgiler= $veriTabani->VeriCekme($sorgu,"BilgileriÇekme");
        $this->setSponsorId($Bilgiler["SponsorId"]);
        $this->setSponsorIsim($Bilgiler["SponsorIsım"]);
        $this->setSponsorResimAdresi($Bilgiler["SponsorResimAdresi"]);
        $this->setSponsorBilgileri($Bilgiler["Sponsor_Bilgileri"]);
    }
    public function Guncelleme($id){
        $sorgu="update sponsorlar set 
         SponsorIsım=$this->sponsorIsim,
         SponsorResimAdresi=$this->SponsorResimAdresi,
         Sponsor_Bilgileri=$this->SponsorBilgileri 
         where SponsorId=$id";
         $guncelleme=new veriTabanıSorgular();
         $guncelleme->Degistirme($sorgu,"Güncelleme",$guncelleme->Baglnatı());
    }

}