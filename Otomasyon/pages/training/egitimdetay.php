<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/trainingProcess.php");
?>

<table class="table">
    <thead>
        <tr>
            <?php
            $cTrainingProcess->trainingId = isset($_POST["trainingName"]) ? $_POST["trainingName"] : null;
            $cTrainingProcess->engineerStaffId = isset($_POST["engineerId"]) ? $_POST["engineerId"] : null;
            $cTrainingProcess->time = isset($_POST["time"]) ? $_POST["time"] : null;
            $result2 = $cTrainingProcess->listDetailTrainingProcess();
            $value1 = $result2->fetch_assoc()
            ?>
            <th><b><u><?php echo $value1["time"] ?></u></b> tarihinde <b><u><?php echo $value1["engineerName"] . " " . $value1["engineerSurname"]; ?></u></b> tarafından <b><u><?php echo $value1["trainingName"] ?></u></b> egitimi alan kişiler</th>
            <th>Durumu</th>
            <th>İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $cTrainingProcess->listDetailTrainingProcess();
        while ($value2 = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $value2["welderName"] . " " . $value2["welderSurname"] ?></td>
                <td class="situation"><?php echo $value2["situation"]; ?></td>
                <td>
                    <?php if ($value2["situation"] == "Bekleniyor") { ?>
                        <button class="btn btn-primary succes" cerName="<?php echo $value2["trainingName"] ?>" walderId="<?php echo $value2["welderId"] ?>" trainingId = "<?php echo $value2["tId"] ?>" >Başarılı</button>
                        <button class="btn btn-primary unSucces" walderId="<?php echo $value2["welderId"] ?>" trainingId = "<?php echo $value2["tId"] ?>" >Başarısız</button>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script src="/Otomasyon/pages/training/js/succesUnsucces.js"></script>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>