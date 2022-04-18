<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/trainingProcess.php");
?>
<div class="d-flex justify-content-center">
    <div class="card w-50">
        <label>Arama yap</label>
        <input type="text" class="form-control" id="search" placeholder="Aramak istediğiniz kelimeyi yazın">
    </div>
</div>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">İd</th>
            <th scope="col">Eğitim adı</th>
            <th scope="col">Eğitimi veren</th>
            <th scope="col">Eğitimi alanlar</th>
            <th scope="col">Eğitim zamanı</th>
            <th scope="col">Eğitim detayı</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $cTrainingProcess->listTrainingProcess();
        while ($value = $result->fetch_assoc()) { ?>
            <tr>
                <form action="egitimdetay.php" method="post">
                    <td scope="row"><?php echo $value["id"]; ?></td>
                    <td scope="row"><input type="hidden" name="trainingName" value="<?php echo $value["trainingName"]; ?>"><?php echo $value["trainingName"] ?></td>
                    <td scope="row"><input type="hidden" name="engineerId" value="<?php echo $value["engineerId"]; ?>"><?php echo $value["engineerName"] . " " . $value["engineerSurname"]; ?></td>
                    <td scope="row"><?php echo $value["welderName"]; ?></td>
                    <td scope="row"><input type="hidden" name="time" value="<?php echo $value["time"]; ?>"><?php echo $value["time"] ?></td>
                    <td><button type="submit" class="btn btn-primary">Detay</button></td>
                </form>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script src="/Otomasyon/pages/training/js/tableSearch.js"></script>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>