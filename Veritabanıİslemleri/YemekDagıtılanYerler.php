<?php


class YemekDagıtılanYerler
{
    public $id = array();
    public $sokakId=array();
    public $yemekDagıtanKisiId=array();

    /**
     * @return int
     */
    public function getKisiListesli(): int
    {
        return $this->KisiListesli;
    }

    /**
     * Seçilen yerde yemek dağıtılıp dağıtılmadığını listeler.
     * @param $id
     */
    public function YerSec($id)
    {
        $sorgu = "select * from yemekDagıtılanYerler where id=$id";
        $veriTabanı = new veriTabanıSorgular();
        $gelenVeriler = $veriTabanı->VeriCekme($sorgu, "Veri çekme", $veriTabanı->Baglnatı());
        $this->setId($gelenVeriler["id"]);
        $this->setSokakId($gelenVeriler["sokakId"]);
        $this->setYemekDagıtanKisiId($gelenVeriler["yemekDagıtanKisiId"]);
    }

    public function __construct()
    {
        $sorgu = "select * from yemekdagıtılanyerler ";
        $veriTabanı = new veriTabanıSorgular();
        $gelenVeriler = $veriTabanı->VeriCekme($sorgu, "Veri çekme", $veriTabanı->Baglnatı());
        if ($gelenVeriler != null) {
            for ($i = 0; $i < count($gelenVeriler); $i++) {

                $this->setId($gelenVeriler[$i]["id"]);
                $this->setSokakId($gelenVeriler[$i]["sokakId"]);
                $this->setYemekDagıtanKisiId($gelenVeriler[$i]["yemekDagıtanKisi"]);
                $this->KisiListesli = $gelenVeriler;
            }
        }
    }

    public function YerEKle($SokakId, $YemekDagıtanKisiId)
    {
        $sorgu = "INSERT INTO yemekdagıtılanyerler(sokakId, yemekDagıtanKisi) VALUES ($SokakId,$YemekDagıtanKisiId)";
        $veriTabanı = new veriTabanıSorgular();
        $gelenVeriler = $veriTabanı->Degistirme($sorgu, "Kayıt ekleme", $veriTabanı->Baglnatı());
    }

    /**
     *Yemek dağıtlan tüm yerleri listeler.
     */


    /**
     * Yeni veriler <b>"set"</b> metotlarıyla güncellendikten sonra bir kere çalıştırılması gereken metot.
     * @param $id
     */
    public function Guncelle($id)
    {
        $sorgu = "update yemekDagıtılanYerler set sokakId=$this->sokakId,yemekDagıtanKisiId=$this->yemekDagıtanKisiId where id=$id";
        $veriTabanı = new veriTabanıSorgular();
        $veriTabanı->Degistirme($sorgu, "Guncelleme", $veriTabanı->Baglnatı());
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
        array_push($this->id, $id);
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
       array_push( $this->sokakId , $sokakId);
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
       array_push( $this->yemekDagıtanKisiId ,$yemekDagıtanKisiId);
    }


}