<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>

</head>
<body>

<form action="../sayfaİslemleri/yemekVerme.php" method="post">
    <label>İlce seçin</label>
    <select id="Ilceler">
        <option> </option>
    </select><br>
    <label>Mahalle girin</label>
    <select id="Mahalleler">
        <option> </option>
    </select><br>
    <label>Sokak girin</label>
    <select name="sokakId" id="Sokaklar">
       <option> </option>
    </select><br>
    <label for="yemekDagitanKisi">Yemek dağıtan kişiyi giriniz:</label>
    <input type="text" name="yemekDagıtanKisi" id="yemekDagitanKisi"><br>

    <button type="submit">Yemek ver</button>
    <script type="text/javascript" src="KonumBulma.js"></script>
</form>
</body>
</html>




