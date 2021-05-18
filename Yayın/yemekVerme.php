<?php
session_start();
if(empty($_SESSION['id']))
{
    header("Location:./examples.html");
}
else {
    echo '
<!DOCTYPE HTML>
<meta charset="UTF-8">
<html>

<head>
    <title>night_sky - examples</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
</head>

<body>
<div id="main">
    <div id="header">
        <div id="logo">
            <div id="logo_text">

                <h1><a href="index.html">As<span class="logo_colour">evim</span></a></h1>
                <h2>Bir yardim kurulusudur.</h2>
            </div>
        </div>
        <div id="menubar">
            <ul id="menu">

                <li><a href="index.html">Anasayfa</a></li>
                <li class="selected"><a href="examples.html">Giris</a></li>
                <li><a href="page.html">Men�</a></li>
                <li><a href="another_page.html">Hakkimizda</a></li>
                <li><a href="contact.html">Kayit Ol</a></li>
            </ul>
        </div>
    </div>
    <div id="site_content">
        <div class="sidebar">
            <h1><h1>G�n�n Yemegi</h1>
                <h4>16.01.2021</h4><b>

                    <p>tavuk suyu &ccedil;orbas&#305; , salata , bulgur pilkav&#305; , hurma tatl&#305;s&#305;</p></b>
                <h1>Bu g&uuml;n Nerdeyiz?</h1>
                <p>&#304;stanbul &#350;i&#351;li 19 may&#305;s caddesi.</p>
                <p><br>
                </p>
                <h1>Ba&#287;&#305;&#351;&ccedil;&#305;lar&#305;m&#305;za te&#351;ekk&uuml;r ederiz...</h1>
                <p><br>
                    <br>

                </p>
                <form method="post" action="#" id="search_form">
                    <p>ileti&#351;im : 0532 794 32 26</p>
                    <p> Mail:AsEvim@gmail.com</p>
                    <form method="post" action="#" id="search_form1">
                        <p>&nbsp;</p>
                    </form>
                </form>
            </h1>
        </div>
        <div id="content">
            <form action="../sayfaİslemleri/yemekVerme.php" method="post">
                <label>Şehir seçin</label>
                <select name="adresler" id="adresler"></select>
                <label>İlce seçin</label>
                <select name="Ilceler" id="Ilceler">
                    <option></option>
                </select><br>
                <label>Mahalle girin</label>
                <select name="Mahalleler" id="Mahalleler">
                    <option></option>
                </select><br>
                <label>Sokak girin</label>
                <select name="sokakId" id="Sokaklar">
                    <option></option>
                </select><br>
                <input type="hidden" value="' . $_SESSION['id'] . '" name="yemekDagitanKisi" id="yemekDagitanKisi"><br>
                <button type="submit">Yemek ver</button>
                <script type="text/javascript" src="KonumBulma.js"></script>
            </form>
            <h1>&nbsp;</h1>
            <h2>&nbsp;</h2>
            <form action="#" method="post">
                <div class="form_settings">          </div>
            </form>
        </div>
    </div>
    <div id="footer">
        <p>&nbsp;</p>
    </div>
</div>
</body>
</html>';
}?>


