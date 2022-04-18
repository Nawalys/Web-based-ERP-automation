<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/examinationFollowUp.php");
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Tc</th>
            <th scope="col">Personel Adı</th>
            <th scope="col">İşe giriş tarihi</th>
            <th scope="col">Muayene türü</th>
            <th scope="col">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $cExaminationFollowUp->listFollowUpExaminations();
        while ($isim = $result->fetch_assoc()) { ?>
            <tr>
                <form action="muayeneolustur.php" method="post">
                    <td scope="col"><input type="hidden" name="tc" value="<?php echo $isim["tc"]; ?>"><?php echo $isim["tc"]; ?></td>
                    <td scope="col"><?php echo $isim["name"] . " " . $isim["surname"]; ?></td>
                    <td scope="col"><?php echo $isim["startDate"]; ?></td>
                    <td scope="col"><?php echo $isim["examinationName"]; ?></td>
                    <td scope="col"><button type="submit" class="btn btn-primary" name="btnExaminationFollowUp">Muayene Kaydı</button></td>
                </form>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>