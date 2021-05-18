<?php


class Sokaklar
{
public $SokakId=array();
public $SokakIsmı=array();
public $MahalleId=array();


    public function __construct($id)
    {
      $sorgu="select * from sokaklar where SokakId=$id";
      $veriTabani=new veriTabanıSorgular();
     $gelenVeriler= $veriTabani->VeriCekme($sorgu,"Veri Cekme",$veriTabani->Baglnatı());
     $this->setSokakId($gelenVeriler[0]["SokakId"]);
     $this->setSokakIsmı($gelenVeriler[0]["SokakIsım"]);
     $this->setMahalleId($gelenVeriler[0]["MahalleId"]);
    }
    public function Guncelle($id){
     $sorgu="update sokaklar set SokakIsmı=$this->SokakIsmı,MahalleId=$this->MahalleId where SokakId=$id";
        $veriTabani=new veriTabanıSorgular();
        $veriTabani->Degistirme($sorgu,"Güncelleme",$veriTabani->Baglnatı());

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
       array_push( $this->SokakId , $SokakId);
    }

    /**
     * @return mixed
     */
    public function getSokakIsmı()
    {
        return $this->SokakIsmı;
    }

    /**
     * @param mixed $SokakIsmı
     */
    public function setSokakIsmı($SokakIsmı): void
    {
      array_push( $this->SokakIsmı , $SokakIsmı);
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
       array_push( $this->MahalleId , $MahalleId);
    }



}