$("#buton").click(function () {
    //Formdata nesenesinin oluşturulması
    var data = new FormData();
    //Verilerin formdata nesnesine eklenmesi
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
        method: 'POST',
        success: function () {
            window.location="index.html";
        },
        error:
            function () {
                alert("Bir hata meydana geldi");
            }
    });

});