$(document).ready(function() {
    $(document).delegate(".confirm","click",function(){
        var id = $(this).attr("value");
        $.ajax({
            type: "POST",
            url: "process/update.php",
            data: {id: id},
            error: function(s) {
                alert("SİSTEMSEL BİR HATA OLUŞTU. OLUŞAN HATA =>" + s);
            },
            success: function(data) {
                $("#result").html(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı',
                    text: 'Kayıt başarıyla onaylandı.',
                });
            },
        });
    });
    $(document).delegate(".delete","click",function(){
        var id = $(this).attr("value");
        $.ajax({
            type: "POST",
            url: "process/delete.php",
            data: {id: id},
            error: function(s) {
                alert("SİSTEMSEL BİR HATA OLUŞTU. OLUŞAN HATA =>" + s);
            },
            success: function(data) {
                $("#result").html(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı',
                    text: 'Kayıt başarıyla bitirildi.',
                });
            },
        });
    });
});