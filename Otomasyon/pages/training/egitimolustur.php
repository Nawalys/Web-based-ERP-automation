<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/trainings.php");
?>

<form action="process/insert.php" method="post">
    <div class="d-flex justify-content-center">
        <div class="card w-50 ">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Eğitim ismi:</label>
                <select class="form-control" name="slctTrainings">
                    <?php
                    $trainings = $cTrainings->getAll();
                    while ($value = $trainings->fetch_assoc()) { ?>
                        <option value='<?php echo $value["id"] ?>'><?php echo $value["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Eğitim verecek:</label>
                <select class="form-control" name="slctEngineer">
                    <?php
                    $engineer = $cStaff->getAll();
                    while ($value = $engineer->fetch_assoc()) {
                        if ($value["position"] == "Mühendis" && $value["department"] == "Kalite kontrol") { ?>
                            <option value='<?php echo $value["id"] ?>'><?php echo $value["name"] . " " . $value["surname"] ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Eğitim alacaklar:</label>
                <select multiple class="form-control" name="slctStaff[]" multiple="multiple" size="5">
                    <?php
                    $welder = $cStaff->getAll();
                    while ($value = $welder->fetch_assoc()) {
                        if ($value["position"] == "Kaynakçı") { ?>
                            <option value='<?php echo $value["id"] ?>'><?php echo $value["tc"] . "/" . $value["name"] . " " . $value["surname"] ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Eğitim Tarihi:</label>
                <input name="dateTime" type="date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" name="btnAddTraining">Kaydet</button>
        </div>
    </div>
</form>

<?php
if (!isset($_GET["egitimolustur"])) {
    $_GET["egitimolustur"] = "index";
}

if ($_GET["egitimolustur"] == "hata1") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hataa...',
            text: 'Tarih veya Eğitim alacaklar kısmı boş bırakılamaz.',
        })
    </script>
<?php } elseif ($_GET["egitimolustur"] == "basarili") { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: 'Eğitim kaydı başarıyla oluşturuldu.',
        })
    </script>
<?php } ?>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>