<!DOCTYPE html>
<meta charset="UTF-8">

<html>
    <head>
        </head>
    <body >
      <p id="yazı" name="yazı"></p>
      <form action="" method="POST">
        <button type="submit" value="1" id="buton1" name="buton1">BAS</button>
    </form>     
</body>
</html>
<?php

session_start();
require($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
require($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/KullanıcıProfil.php");
require($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/YemekDagıtılanYerler.php");
require($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/AdresBulma.php");

echo $_SESSION["hesapTipi"]."a";
$yemekDagıtalanYerler=new YemekDagıtılanYerler();
echo $yemekDagıtalanYerler->getId()."<br>";
for($i=1;$i<$yemekDagıtalanYerler->getKisiListesli();$i++){
    echo "<div>$i deneme</div>";
    $adresleri=new Adresler($yemekDagıtalanYerler->getSokakId());
    echo  $adresleri->getSehirIsmi();
}
echo $_SESSION["id"];
$kullanıcıBilgiler=new KullanıcıProfil($_SESSION["id"]);
echo $kullanıcıBilgiler->getIsim()."<br>";
echo $kullanıcıBilgiler->getSoyisim()."<br>";
echo $kullanıcıBilgiler->getDogumGunu()."<br>";
echo $kullanıcıBilgiler->getUyelikTarihi()."<br>";
echo '<img src="'.$kullanıcıBilgiler->getProfilFotografı().'">';
?>