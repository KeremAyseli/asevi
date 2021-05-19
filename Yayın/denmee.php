
<?php
$Baglantı=new PDO("mysql:host=35.225.11.58:3306;dbname=asevi", "keremayseli", '123Ke');
if($Baglantı->query("select * from kullanıcılar")==true){
    echo "Veritabanına bağlanıldı";
    $sonuc=$Baglantı->query("select * from kullanıcılar");
    $this->setSatırSayısı($sonuc->rowCount());
    echo $sonuc->fetchAll();
}
else{
    echo "veritabanına bağlanılamadı";
}
?>
