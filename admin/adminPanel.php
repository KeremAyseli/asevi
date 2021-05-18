<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript" src="../Yayın/jquery-3.5.1.min.js"></script>
</head>
<body>

    <label>Kullanıcı banla</label>
    <input type="number" id="banId">
    <button type="submit" id="KullanıcıBanla">Banla</button><br>


    <label>Yemek verilen yeri kaldır</label>
    <input type="number" id="banYemek">
    <button type="submit" id="YemekBanlama">Yemek verilen yeri kaldır</button>

</body>
</html>

<script>
    //*
    // Kullanıcı ve yemek silmek için jquery ajax kullandık,bunun sebebi işlemlerin asenkron olmasını istememiz.
    // *//
    $("#KullanıcıBanla").click(function (){
        var banId = $("#banId").val();
        $.ajax({
            //Gönderme işeleminin tipi
            type:"POST",
            //Gönderilen adresi
            url:"kullanıcıBanlama.php",
            //Giden veriler
            data:{"ID":banId},
            //İşlem başarılı olursa yapılacak işlemler.
            success:
            function (result){
                alert("Kullanıcı Başarıyla silindi.Silinen Kullanıcı Id: "+result);
            },
            //İşlem başarılı olursa yapılacak işlemler.
            error:
            function (){
                alert("Bir hata meydana geldi,lütfen işlemi yapmayı tekrar deneyin");
            }
        });
    });
    $("#YemekBanlama").click(function (){
        var banYemekId=$("#YemekBanlama").val();
        $.ajax({
            type: "POST",
            url: "./yemekBanlama.php",
            data: {"Yemek":banYemekId},
            success:
            function (result){
                alert("Yemek kaldırma işlemi başarılı.Kaldırılan yemek Id:"+result);
            },
            error:
            function (){
                alert("Hata meydana meydana geldi,lütfen işlemi kontrol edip tekrar deneyin.");
            }
        });
    });

</script>



