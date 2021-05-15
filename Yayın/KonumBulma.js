var sokaklar = $("#Sokaklar");
var mahalleler = $("#Mahalleler");
$(document).ready(function () {

    $.ajax(
        {
            type: "POST",
            data: {"Id": null, "TabloIsım": "adresler", "UstTablo": null},
            url: "../sayfaİslemleri/yemekVermeJs.php",
            success:
                function (result) {
                    var SehirBilgileri = JSON.parse(result);
                    $("#adresler").append(new Option("---","---"));
                    for (var i = 0; i < SehirBilgileri.length; i++) {
                        $("#adresler").append(new Option(SehirBilgileri[i].Sehirisim, SehirBilgileri[i].SehirId));
                    }
                },
            error:
                function (result) {
                    alert("Hata meydana geldi" + result);
                }
        })
});
$("#adresler").on("change",function () {
    var SehirId=$("#adresler").val();

    $.ajax(
        {
            type: "POST",
            data: {"Id": SehirId, "TabloIsım": "Ilceler", "UstTablo": "SehirId"},
            url: "../sayfaİslemleri/yemekVermeJs.php",
            success:
                function (result) {
                console.log(result);
                    var IlceBigileri = JSON.parse(result);
                    for (var i = 0; i < IlceBigileri.length; i++) {
                        $("#Ilceler").append(new Option(IlceBigileri[i].IlceIsım, IlceBigileri[i].IlceId));
                    }
                },
            error:
                function (result) {
                    alert("Hata meydana geldi" + result);
                }
        })
});
$("#Ilceler").on("change", function () {
        mahalleler.empty();

        var IlceId = $("#Ilceler").val();
        console.log(IlceId);
        $.ajax({
            type: "POST",
            data: {"Id": IlceId, "TabloIsım": "Mahallerler", "UstTablo": "IlceId"},
            url: "../sayfaİslemleri/yemekVermeJs.php",
            success:
                function (result) {
                    console.log(result);
                    var jsonParcalama = JSON.parse(result);
                    if (mahalleler.val() < 0) {
                        for (var i = 0; i < jsonParcalama.length; i++) {
                            $("#Mahalleler").append(new Option(jsonParcalama[i].MahalleIsım, jsonParcalama[i].MahalleId));
                        }
                    } else {
                        mahalleler.empty();
                        mahalleler.append(new Option("---", "---"));
                        for (var i = 0; i < jsonParcalama.length; i++) {
                            $("#Mahalleler").append(new Option(jsonParcalama[i].MahalleIsım, jsonParcalama[i].MahalleId));
                        }
                    }

                },
            error(result) {
                alert(result);
            }
        });
    }
);
$("#Mahalleler").on("change", function () {
    sokaklar.empty();
    var mahalleId = $("#Mahalleler").val();
    console.log(mahalleId);
    $.ajax({
            type: "POST"
            , data: {"Id": mahalleId, "TabloIsım": "sokaklar", "UstTablo": "MahalleId"},
            url: "../sayfaİslemleri/yemekVermeJs.php",
            success:
                function (resultSokaklar) {
                    console.log(resultSokaklar);
                    var jsonGelenler = JSON.parse(resultSokaklar);
                    if (sokaklar.val() <= 0) {
                        for (let i = 0; i < jsonGelenler.length; i++) {
                            sokaklar.append(new Option(jsonGelenler[i].SokakIsım, jsonGelenler[i].SokakId));
                        }
                    } else {
                        sokaklar.empty();
                        sokaklar.append(new Option("---", "---"))
                        sokaklar.append(new Option(null, null));
                        for (let i = 0; i < jsonGelenler.length; i++) {
                            sokaklar.append(new Option(jsonGelenler[i].SokakIsım, jsonGelenler[i].SokakId));
                        }

                    }
                },
            error(result) {
                console.log(result);
            }
        }
    );
});


$('#Gonder').click(function () {
     console.log($('#EvsizSayısı').val()!=null ? "Yanlış":"Doğru");
    var EvsizSayısı = $('#EvsizSayısı').val()!=null ? 0:$('#EvsizSayısı').val();
    var HayvanSayısı = $('#HayvanSayısı').val()!=null ? 0 :$('#HayvanSayısı').val();
    var AileSayısı = $('#AileSayısı').val()!=null ? 0:$('#AileSayısı').val();
    var OgrenciSayısı = $('#OgrenciSayısı').val()!=null ? 0:$('#OgrenciSayısı').val();
    console.log(EvsizSayısı);
    $.ajax({
        type: "POST",
        data: {
            "MahalleId": mahalleler.val(),
            "EvsizSayısı": EvsizSayısı,
            "HayvanSayısı": HayvanSayısı,
            "AileSayısı": AileSayısı,
            "OgrenciSayısı": OgrenciSayısı
        },
        url: "../sayfaİslemleri/BolgeDurumGirme.php",
        success:
           function (result){
            console.log(result);
           },
        error:
            function (result) {
                alert(result);
            }
    });
});
$("#SorgulamaButonu").click(function (){
    $.ajax({
        type:"POST",
        data:{
            "MahalleId":mahalleler.val()
        },
        url:"../sayfaİslemleri/BolgeOrtalamasıAlma.php",
        success:
        function (result){
            console.log(result);
            var BolgeBilgileri=JSON.parse(result);
            $("#EvsizSayısı").text(BolgeBilgileri.Evsiz);
            $("#HayvanSayısı").text(BolgeBilgileri.Hayvan);
            $("#AileSayısı").text(BolgeBilgileri.aileler);
            $("#OgrenciSayısı").text(BolgeBilgileri.ogrenci);
        },
        error:
        function (result){
           alert("Hata");
        }
    });
});