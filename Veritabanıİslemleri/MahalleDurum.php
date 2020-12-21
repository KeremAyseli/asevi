<?php

require ("veriTabanıSorgular.php");
class MahalleDurum
{

public $MahalleId;
public $EvsizSayisi;
public $HayvanSayisi;
public $YardımaİhtiyaciOlanAileler;
public $OgrenciSayisi;

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
    public function getEvsizSayisi()
    {
        return $this->EvsizSayisi;
    }

    /**
     * @param mixed $EvsizSayisi
     */
    public function setEvsizSayisi($EvsizSayisi): void
    {
        $this->EvsizSayisi = $EvsizSayisi;
    }

    /**
     * @return mixed
     */
    public function getHayvanSayisi()
    {
        return $this->HayvanSayisi;
    }

    /**
     * @param mixed $HayvanSayisi
     */
    public function setHayvanSayisi($HayvanSayisi): void
    {
        $this->HayvanSayisi = $HayvanSayisi;
    }

    /**
     * @return mixed
     */
    public function getYardımaİhtiyaciOlanAileler()
    {
        return $this->YardımaİhtiyaciOlanAileler;
    }

    /**
     * @param mixed $YardımaİhtiyaciOlanAileler
     */
    public function setYardımaİhtiyaciOlanAileler($YardımaİhtiyaciOlanAileler): void
    {
        $this->YardımaİhtiyaciOlanAileler = $YardımaİhtiyaciOlanAileler;
    }

    /**
     * @return mixed
     */
    public function getOgrenciSayisi()
    {
        return $this->OgrenciSayisi;
    }

    /**
     * @param mixed $OgrenciSayisi
     */
    public function setOgrenciSayisi($OgrenciSayisi): void
    {
        $this->OgrenciSayisi = $OgrenciSayisi;
    }
    function __constructur ($MahalleId){
   $veriTabani=new veriTabanıSorgular();
   $Baglantı=new mysqli("localhost","root",null,"deneme");
   $sorgu = "Select * from mahalleler where MahalleId='$MahalleId'";
 $mahalleBilgileri=  $veriTabani->VeriCekme($sorgu,$Baglantı,"VeriCekme");
   $this->setMahalleId($mahalleBilgileri["MahalleId"]);
   $this->setEvsizSayisi($mahalleBilgileri["EvsizSayisi"]);
   $this->setHayvanSayisi($mahalleBilgileri["HayvanSayisi"]);
   $this->setYardımaİhtiyaciOlanAileler($mahalleBilgileri["YardimaİhtiyaciOlanAileler"]);
   $this->setOgrenciSayisi($mahalleBilgileri["OgrenciSayisi"]);

}
 function GUncelleme($id){
$sorgu ="update MahalleDurum set 
                        EvsizSayisi=$this->EvsizSayisi,
                        HayvanSayisi=$this->HayvanSayisi,
                        YardımaİhtiyacıOlanAilerler=$this->YardımaİhtiyaciOlanAileler,
                        OgrenciSayisi=$this->OgrenciSayisi
                        where MahalleId=$id";
$guncelleme=new veriTabanıSorgular();
$guncelleme->Degistirme($sorgu,"Güncelleme",$guncelleme->Baglnatı());
 }

}