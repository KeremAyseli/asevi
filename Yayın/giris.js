//Giriş işlemlerinin çalıştırılması için jquery methodu.
$("#GirisButonu").click(function (){
    var eposta=$("#Eposta").val();
    var sifre =$("#sifre").val();
    $.ajax({
        method:"POST",
        url:"../sayfaİslemleri/GirisEkrani.php",
        data:{"Eposta":eposta,"Sifre":sifre},
        success:
            function (result){
              if(result=="girisBasarılı")
                {
                    window.location="anasayfa.php";
                }
                else{
                    console.log(result);
                    alert("Hatalı giriş yaptınız");
                }
            },
        error:
            function (result){
                alert("Bir hata oluştu"+result);
            }
    });

})
