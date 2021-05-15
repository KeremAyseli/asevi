<?php
session_start();
if (empty($_SESSION['id'])) {
    header("Location:./GirisEkranı.html");
} else {

    include($_SERVER["DOCUMENT_ROOT"] . "/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/asevi/Veritabanıİslemleri/AdresBulma.php");
    $veriTabanı = new veriTabanıSorgular();
    $kisiler = $veriTabanı->VeriCekme("select * from kullanıcılar where id=" . $_SESSION['id'], "Kullanıcı verileri Ogrenme", $veriTabanı->Baglnatı());
    $YemekDagıtlanYerler = $veriTabanı->VeriCekme("select * from yemekdagıtılanyerler", "Yemek dagıtılan yerleri listeleme", $veriTabanı->Baglnatı());

    for ($i = 0; $i < count($YemekDagıtlanYerler); $i++) {
        $adresler = new AdresBulma($YemekDagıtlanYerler[$i]['sokakId']);
        echo  $adresler->getSehir()[0];
        echo $adresler->getIlce()."<br>";
        echo $adresler->getMahalle()."<br>";
        echo $adresler->getSokak()[0]."<br>";
        echo "-----------------------------<br>";

    }
    echo $kisiler[0]["isim"] . "<br>";
    echo $kisiler[0]["soyisim"] . "<br>";
    echo $kisiler[0]["dogunGunu"] . "<br>";
    echo $kisiler[0]["uyelikTarihi"] . "<br>";
    echo '<img src="' . $kisiler[0]["profilResimAdresi"] . '">';
    ?>

    <!DOCTYPE html>
    <meta charset="UTF-8">

    <html>
    <head>
    </head>
    <body>
    <p id="yazı" name="yazı"></p>
    <form action="" method="POST">
        <button type="submit" value="1" id="buton1" name="buton1">BAS</button>
    </form>
    <a href="yemekVerme.php">Yemek verme</a>
    <a href="BilgiGirme.html">BilgiGirme</a>
    <a href="BolgeDurumGorme.html">Bolge Durum Girme</a>
    </body>
    </html>
<?php } ?>