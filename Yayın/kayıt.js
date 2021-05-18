$("#BilgileriGonder").click(function () {
console.log("tıklandı");
    var isim = $("#isim").val();
    var soyisim = $("#soyisim").val();
    var eposta = $("#eposta").val();
    var dogumGunu = $("#dogumGunu").val();
    var sifre = $("#sifre").val();

    $.ajax({
        method: "POST",
        url: "../sayfaİslemleri/KayıtEkranı.php",
        data: {
            "isim": isim,
            "soyisim": soyisim,
            "eposta": eposta,
            "dogumGunu": dogumGunu,
            "sifre": sifre
        },
        success:
            function (result) {
            console.log(result);
                window.location="resimSecme.php";
            },
        error:
            function (result) {
                console.log(result);
            }
    });
})