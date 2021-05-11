<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>
</head>
<body>
<form action="../sayfaİslemleri/yemekVerme.php" method="post">

    <label>Sokak girin</label>
    <select name="sokakId" id="sokakId"onchange="listele('Sokaklar')">
        <option value="1">beşirgazi</option>
        <option value="2">berşigazi alt sokak</option>
    </select><br>
    <label for="yemekDagitanKisi">Yemek dağıtan kişiyi giriniz:</label>
    <input type="text" name="yemekDagıtanKisi" id="yemekDagitanKisi"><br>

    <button type="submit" >Yemek ver</button>

</form>
</body>
</html>
<script>
  var sokakId= $("#sokakId").val();
function listele(tablo){
  $.ajax({type:"POST",
      data:{"SokakId":sokakId,"TabloIsım":tablo},
      url:"../sayfaİslemleri/yemekVermeJs.php",

      success:
          function (result){
              console.log(result);
               var jsonParcalama=JSON.parse(result);

               var secme=$("<select>").appendTo("body");
             for(var i=0;i<jsonParcalama.length;i++)
             {secme.append(new Option(jsonParcalama[i].SokakIsım,jsonParcalama[i].SokakId));}
          },
      error(result){
      alet(result);
      }
  });
}
</script>



