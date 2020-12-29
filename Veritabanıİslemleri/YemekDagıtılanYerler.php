<?php

require ("veriTabanıSorgular.php");
class YemekDagıtılanYerler
{
public $id;
public $sokakId;
public $yemekDagıtanKisiId;

    public function __construct($id)
    {
        $sorgu="select * from yemekDagıtılanYerler where id=$id";
        $veriTabanı=new veriTabanıSorgular();
       $gelenVeriler= $veriTabanı->VeriCekme($sorgu,"Veri çekme",$veriTabanı->Baglnatı());
       $this->setId($gelenVeriler["id"]);
        $this->setSokakId($gelenVeriler["sokakId"]);
        $this->setYemekDagıtanKisiId($gelenVeriler["yemekDagıtanKisiId"]);
    }
    public function Guncelle($id){
     $sorgu="update yemekDagıtılanYerler set sokakId=$this->sokakId,yemekDagıtanKisiId=$this->yemekDagıtanKisiId where id=$id";
     $veriTabanı=new veriTabanıSorgular();
     $veriTabanı->Degistirme($sorgu,"Guncelleme",$veriTabanı->Baglnatı());
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSokakId()
    {
        return $this->sokakId;
    }

    /**
     * @param mixed $sokakId
     */
    public function setSokakId($sokakId): void
    {
        $this->sokakId = $sokakId;
    }

    /**
     * @return mixed
     */
    public function getYemekDagıtanKisiId()
    {
        return $this->yemekDagıtanKisiId;
    }

    /**
     * @param mixed $yemekDagıtanKisiId
     */
    public function setYemekDagıtanKisiId($yemekDagıtanKisiId): void
    {
        $this->yemekDagıtanKisiId = $yemekDagıtanKisiId;
    }


}