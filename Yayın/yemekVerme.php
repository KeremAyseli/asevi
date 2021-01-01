<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="../sayfaİslemleri/yemekVerme.php" method="post">
    <label>İlçe girin</label>
    <select>
        <option value="Eyüpsultan">EyüpSultan</option>
        <option value="Eyüpsultan">EyüpSultan</option>
    </select><br>
    <label>Mahalle girin</label>
    <select>
        <option value="Sakarya">sakarya</option>
        <option value="Sakarya">sakarya</option>
    </select><br>
    <label>Sokak girin</label>
    <select name="sokakId">
        <option value="1">beşirgazi</option>
        <option value="2">berşigazi alt sokak</option>
    </select><br>
    <label for="yemekDagitanKisi">Yemek dağıtan kişiyi giriniz:</label>
    <input type="text" name="yemekDagıtanKisi" id="yemekDagitanKisi"><br>

    <button type="submit" >Yemek ver</button>

</form>
</body>
</html>

<?php

?>
