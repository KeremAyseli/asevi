<!DOCTYPE html>
<meta charset="utf-8">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>night_sky</title>
    <meta name="description" content="website description">
    <meta name="keywords" content="website keywords, website keywords">
    <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>
  <body>
    <div id="main">
      <div id="header">
        <div id="logo">
          <div id="logo_text"> <!-- class="logo_colour", allows you to change the colour of the text -->
            <h1><a href="index.html">As<span class="logo_colour">evim</span></a></h1>
            <h2>Bir Yardim kurulusudur.</h2>
          </div>
        </div>
        <div id="menubar">
          <ul id="menu">
            <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
            <li class="selected"><a href="index.html">Anasayfa</a></li>
            <li><a href="examples.html">Giris</a><a href="araclarimiz.html."></a></li>
            <li><a href="page.html">Men�</a></li>
            <li><a href="another_page.html">Hakkimizda</a></li>
            <li><a href="contact.html">Kayit Ol</a></li>
          </ul>
        </div>
      </div>
      <div id="site_content">
        <div class="sidebar">
          <h1></h1>
          <h1>Günün Yemegi</h1>
          <h4>16.01.2021</h4>
          <b>
            <p>tavuk suyu �orbas? , salata , bulgur pilkav? , hurma tatl?s?</p>
          </b>
          <h1>Bu g�n Nerdeyiz?</h1>
          <p>?stanbul ?i?li 19 may?s caddesi.</p>
          <p><br>
          </p>
          <h1>Ba???�?lar?m?za te?ekk�r ederiz...</h1>
          <p><br>
            <br>
          </p>
          <form method="post" action="#" id="search_form">
            <p>ileti?im : 0532 794 32 26</p>
            <p> Mail:AsEvim@gmail.com</p>
          </form>
        </div>
        <div id="content"><br>
        <?php
session_start();
if (empty($_SESSION['id'])) {
    header("Location:./examples.html");
} else {

    include($_SERVER["DOCUMENT_ROOT"] . "/asevi/VeritabaniIslemleri/veriTabanıSorgular.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/asevi/VeritabaniIslemleri/AdresBulma.php");
    $veriTabanı = new veriTabanıSorgular();
    $kisiler = $veriTabanı->VeriCekme("select * from kullanıcılar where id=" . $_SESSION['id'], "Kullanıcı verileri Ogrenme", $veriTabanı->Baglnatı());
    $YemekDagıtlanYerler = $veriTabanı->VeriCekme("select * from yemekdagıtılanyerler", "Yemek dagıtılan yerleri listeleme", $veriTabanı->Baglnatı());

    //Dağıtılan yemekler ve yerleri
    for ($i = 0; $i < count($YemekDagıtlanYerler); $i++) {
        $adresler = new AdresBulma($YemekDagıtlanYerler[$i]['sokakId']);
       echo "<p>".$adresler->getSehir()[0]."</p>";
        echo $adresler->getIlce()."<br>";
        echo $adresler->getMahalle()."<br>";
        echo $adresler->getSokak()[0]."<br>";

    }
    //KişiBilgileri
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
          </div>
      </div>
      <div id="footer">
        <p>&nbsp;</p>
      </div>
    </div>
  </body>
</html>
