<?php
var_dump($_FILES);
if (!empty($_FILES['resim0'])&&!empty($_POST['Id'])) {
    include ($_SERVER["DOCUMENT_ROOT"]."/asevi/Veritabanıİslemleri/veriTabanıSorgular.php");
    $resimTur = $_FILES['resim0']["type"];
    $resimTmpİsim = $_FILES['resim0']['tmp_name'];
    $resimBoyut = $_FILES['resim0']['size'];
    $resimDosyasıAdresi = $_SERVER['DOCUMENT_ROOT'] . '/asevi/resimler/';
    $resimHedef = $resimDosyasıAdresi . basename($_FILES['resim0']['name']);
    if ($resimTur == "image/gif" || $resimTur == "image/png"
        || $resimTur == "image/jpeg" || $resimTur == "image/jpg") {
        if ($resimBoyut > (1024 * 1024 * 10)) {
            echo "Dosya çok büyük";
        } else {
            move_uploaded_file($resimTmpİsim, $resimHedef);
        }
    }
    echo $resimDosyasıAdresi."   ";
    echo $resimHedef."   ";
    echo $resimTmpİsim."  ";

    $resim="../resimler/".$_FILES['resim0']['name'];
     $veriTabanı=new veriTabanıSorgular();
echo $resim;
    echo $veriTabanı->kullanıcıresimEkleme($resim,$_POST['Id']);
}
else{
    echo "olmadı";
}