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

</form>
</body>
</html>
<script>
    var sokaklar = $("#Sokaklar");
    var mahalleler = $("#Mahalleler");
    $(document).ready(function () {
        $.ajax(
            {
                type: "POST",
                data: {"Id": null, "TabloIsım": "Ilceler", "UstTablo": null},
                url: "../sayfaİslemleri/yemekVermeJs.php",
                success:
                    function (result) {
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
                data: {"Id":IlceId , "TabloIsım": "Mahallerler", "UstTablo": "IlceId"},
                url: "../sayfaİslemleri/yemekVermeJs.php",
                success:
                    function (result) {
                        console.log(result);
                        var jsonParcalama = JSON.parse(result);
                        if (mahalleler.val() < 0) {
                            for (var i = 0; i < jsonParcalama.length; i++) {
                                $("#Mahalleler").append(new Option(jsonParcalama[i].MahalleIsım, jsonParcalama[i].MahalleId));
                            }
                        }
                        else {
                            mahalleler.empty();
                            mahalleler.append(new Option("---","---"));
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
                            sokaklar.append(new Option("---","---"))
                            sokaklar.append(new Option(null,null));
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
</script>



