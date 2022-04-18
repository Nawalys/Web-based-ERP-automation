$("#form").on('submit', function(e) {
    //name="kayıtolustur" olan formun submit işlemi gerçekleştiğinde bu fonksiyonu çalıştır dedik.
    e.preventDefault(); //kendi submit özelliklerini çalıştırmasın bizim yazdığımız kodları çalıştırsın.
    var formData = $(this).serialize(); //Form verilerini göndereceğimiz için form verilerini bir değişkene atadık.
    $.ajax({
        type: "POST", //sayfa gönderme tipidir. Gönderilen verileri post olarak göndermesini söyledik.
        url: "process/insert.php", //verileri hangi sayfaya göndereceğini yazıyoruz. dosya_yolu/dosya.php
        data: formData, //data olarak form verilerini aldığımız değişkeni yazıyoruz. Çünkü bu verileri post edeceğiz.
        error: function(s) {
            $("#result").html("SİSTEMSEL BİR HATA OLUŞTU. OLUŞAN HATA =>" + s);
        },
        success: function(data) {
            $("#result").html(data);
            $("#form").find(".x").val("");
        },
    });
});

$("#form").on('submit', function(e) {
    //name="kayıtolustur" olan formun submit işlemi gerçekleştiğinde bu fonksiyonu çalıştır dedik.
    e.preventDefault(); //kendi submit özelliklerini çalıştırmasın bizim yazdığımız kodları çalıştırsın.
    var formData = $(this).serialize(); //Form verilerini göndereceğimiz için form verilerini bir değişkene atadık.
    $.ajax({
        type: "POST", //sayfa gönderme tipidir. Gönderilen verileri post olarak göndermesini söyledik.
        url: "process/email.php", //verileri hangi sayfaya göndereceğini yazıyoruz. dosya_yolu/dosya.php
        data: formData, //data olarak form verilerini aldığımız değişkeni yazıyoruz. Çünkü bu verileri post edeceğiz.
        error: function(s) {
            $("#result").html("SİSTEMSEL BİR HATA OLUŞTU. OLUŞAN HATA =>" + s);
        },
        success: function(data) {
            $("#form").find(".x").val("");
        },
    });
});