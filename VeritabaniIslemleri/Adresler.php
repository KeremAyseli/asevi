<?php


class Adresler
{

    public $SehirId = array();
    public $SehirIsmi = array();


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
        array_push($this->SehirId, $SehirId);
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
        array_push($this->SehirIsmi, $SehirIsmi);
    }




    public function __construct($id)
    {
        $VeriTabani = new veriTabanıSorgular();
        $sorgu = "select * from adresler where SehirId=$id";
        $gelenveriler = $VeriTabani->VeriCekme($sorgu, "Veri Çekme", $VeriTabani->Baglnatı());
            $this->setSehirId($gelenveriler[0]['SehirId']);
            $this->setSehirIsmi($gelenveriler[0]['Sehirisim']);
    }

    public function Guncelleme($id)
    {
        $sorgu = "update adresler set SehirIsmi=$this->SehirIsmi where SehirId=$id";
        $guncelleme = new veriTabanıSorgular();
        $guncelleme->Degistirme($sorgu, "Güncelleme", $guncelleme->Baglnatı());

    }

}