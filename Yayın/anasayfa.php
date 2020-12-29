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
require($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/KullanıcıProfil.php");



echo $_SESSION["id"];
$kullanıcıBilgiler=new KullanıcıProfil($_SESSION["id"]);
echo $kullanıcıBilgiler->getIsim()."<br>";
echo $kullanıcıBilgiler->getSoyisim()."<br>";
echo $kullanıcıBilgiler->getDogumGunu()."<br>";
echo $kullanıcıBilgiler->getUyelikTarihi()."<br>";
echo '<img src="'.$kullanıcıBilgiler->getProfilFotografı().'">';
?>