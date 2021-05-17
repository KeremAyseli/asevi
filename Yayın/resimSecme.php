<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>
</head>
<body>
<form enctype="multipart/form-data" id="Form">
    <label>Profil resmi seçin</label><br>
    <input type="file" id="resim" name="resim"/><br>
    <input type="hidden" value="<?php session_start(); echo $_SESSION['KayıtId']?>" id="id">
    <button id="buton" type="button">bas</button>

</form>
</body>
</html>
<script>
    $("#buton").click(function () {
        var data = new FormData();
        $.each($('#resim')[0].files, function (i, file) {
            data.append('resim' + i, file);
        });
        data.append("Id",$("#id").val());
        $.ajax({
            url: '../sayfaİslemleri/resimEkleme.php',
            data: data,
            enctype: 'multipart/form-data',
            processData:false,
            contentType: false,
            cache:false,

            method: 'POST', // For jQuery < 1.9
            success: function (data) {
                console.log(data);
            },
            error:
                function (result) {
                    console.log(result);
                }
        });

    });

</script>