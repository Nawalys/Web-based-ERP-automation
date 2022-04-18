$(document).ready(function() {
    $(".succes").click(function() {
        var walderId = $(this).attr("walderId");
        var trainingId = $(this).attr("trainingId");
        var cerName = $(this).attr("cerName");
        var changeColumn = $(this).parents("tr").find(".situation");
        var btnUnSucces = $(this).parents("td").find(".unSucces");
        var btnSucces = $(this);

        $.post("process/insert.php", {
            "succes": walderId,
            "trainingId": trainingId,
            "cerName": cerName
        }, function() {
            changeColumn.text("Başarılı");
            btnUnSucces.hide(400);
            btnSucces.hide(400);
        })
    })
    $(".unSucces").click(function() {
        var walderId = $(this).attr("walderId");
        var trainingId = $(this).attr("trainingId");
        var changeColumn = $(this).parents("tr").find(".situation");
        var btnSucces = $(this).parents("td").find(".succes");
        var btnUnSucces = $(this);

        $.post("process/insert.php", {
            "unSucces": walderId,
            "trainingId": trainingId
        }, function() {
            changeColumn.text("Başarısız");
            btnUnSucces.hide(400);
            btnSucces.hide(400);
        })
    })
})