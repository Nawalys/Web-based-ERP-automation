<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/examinationProcess.php");

?>
<div class="d-flex justify-content-center">
    <div class="card w-50">
        <label>Arama yap</label>
        <input type="text" class="form-control" id="search" placeholder="Aramak istediğiniz kelimeyi yazın">
    </div>
</div>


<table class="table">
    <thead>
        <tr>
            <th scope="col">İd</th>
            <th scope="col">Doktor adı</th>
            <th scope="col">Muayene olan kişi sayısı</th>
            <th scope="col">Muayene tarihi</th>
            <th scope="col">Muayene türü</th>
            <th scope="col">Muayene detay</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $cExaminationProcess->listAllExamination();
        while ($value = $result->fetch_assoc()) { ?>
            <tr>
                <form action="muayenedetay.php" method="post">
                    <td scope="row"><?php echo $value["id"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdDoctorId" value="<?php echo $value["doctorId"]; ?>"><?php echo $value["doctorName"] . " " . $value["doctorSurname"]; ?></td>
                    <td scope="row"><?php echo $value["staffName"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdTime" value="<?php echo $value["time"]; ?>"><?php echo $value["time"] ?></td>
                    <td scope="row"><input type="hidden" name="tdExaminationId" value="<?php echo $value["examinationId"]; ?>"><?php echo $value["examinationName"] ?></td>
                    <td><button type="submit" class="btn btn-primary" name="btnExaminationDetail">Detay</button></td>
                </form>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script src="/Otomasyon/pages/examination/js/tableSearch.js"></script>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>