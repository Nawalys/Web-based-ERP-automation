$(document).ready(function() {
    $(".delete").click(function() {
        var deleteId = $(this).attr("deleteId");
        var deletedColumn = $(this).parents("tr");
        $.post("process/delete.php", {
            "staffCertificateDelete": deleteId
        }, function() {
            deletedColumn.hide(400);
            Swal.fire({
                icon: 'success',
                title: 'Başarılı',
                text: 'Personel sertifikası başarıyla silindi'
            })
        })
    })
})