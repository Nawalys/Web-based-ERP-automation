<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/examinationProcess.php");
?>

<table class="table">
    <thead>
        <tr>
            <?php
            $cExaminationProcess->doctorId = isset($_POST["tdDoctorId"]) ? $_POST["tdDoctorId"] : null;
            $cExaminationProcess->examinationId = isset($_POST["tdExaminationId"]) ? $_POST["tdExaminationId"] : null;
            $cExaminationProcess->time = isset($_POST["tdTime"]) ? $_POST["tdTime"] : null;
            $result = $cExaminationProcess->listDetailExamination();
            $value1 = $result->fetch_assoc();
            ?>
            <th>Muayene İşlem İd</th>
            <th scope="col"><b><u><?php echo $value1["time"] ?></u></b> tarihinde <b><u><?php echo $value1["doctorName"] . " " . $value1["doctorSurname"]; ?></u></b> tarafından <b><u><?php echo $value1["examinationName"] ?></u></b> muayenesi olan kişiler</th>
            <th>Açıklama</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result2 = $cExaminationProcess->listDetailExamination();
        while ($value2 = $result2->fetch_assoc()) { ?>
            <tr>
                <td scope="row"><?php echo $value2["id"]; ?></td>
                <td scope="row"><?php echo $value2["staffName"] . " " . $value2["staffSurname"] ?></td>
                <td scope="row"><?php echo $value2["comment"]; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php");
?>