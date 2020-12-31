<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="admin.php" method="post">
    <label>Kullanıcı banla</label>
    <input type="number" name="banId">
    <button type="submit">Banla</button><br>
</form>
<form action="admin.php" method="post">
    <label>Yemek verilen yeri kaldır</label>
    <input type="number" name="banYemek">
    <button type="submit">Yemek verilen yeri kaldır</button>
</form>
</body>
</html>

<?php
session_start();
if($_SESSION!=null){
    if($_SESSION['durum']==false){
        echo 'OLMAYAN BİR DEĞER GİRDİNİZ';
    }
}


