<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php"); 
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/departments.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/positions.php");
?>

<div class="d-flex justify-content-center">
    <div class="card w-50 ">
        <form action="process/updateDelete.php" method="post">
            <div class="form-group">
                <input name="txtId" hidden type="text" class="form-control" value="<?php echo $_POST["tdId"] ?>">
            </div>
            <div class="form-group">
                <label>Tc:</label>
                <input name="txtTc" type="text" class="form-control" value="<?php echo $_POST["tdTc"] ?>">
            </div>
            <div class="form-group">
                <label>Ad:</label>
                <input name="txtName" type="text" class="form-control" value="<?php echo $_POST["tdName"] ?>">
            </div>
            <div class="form-group">
                <label>Soyad:</label>
                <input name="txtSurname" type="text" class="form-control" value="<?php echo $_POST["tdSurname"] ?>">
            </div>
            <div class="form-group">
                <label>Doğum tarihi:</label>
                <input name="dateBirthday" type="date" class="form-control" value="<?php echo $_POST["tdBirthday"] ?>">
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Cinsiyet:</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radGender" value="Erkek" <?php if ($_POST["tdGender"] == "Erkek") { ?> checked> <?php } ?>
                        <label class="form-check-label" for="gridRadios1">
                            Erkek
                        </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radGender" value="Kadın" <?php if ($_POST["tdGender"] == "Kadın") { ?> checked> <?php } ?>
                        <label class="form-check-label" for="gridRadios2">
                            Kadın
                        </label>
                        </div>
                    </div>
            </fieldset>
            <div class="form-group">
                <label>Telefon no:</label>
                <input name="txtPhoneNumber" type="text" class="form-control" value="<?php echo $_POST["tdPhoneNumber"] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email:</label>
                <input type="email" name="txtEmail" class="form-control" aria-describedby="emailHelp" value="<?php echo $_POST["tdEmail"] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Adres girin:</label>
                <textarea name="txtAddress" class="form-control" rows="3"><?php echo $_POST["tdAddress"] ?></textarea>
            </div>
            <div class="form-group">
                <label>İşe giriş tarihi:</label>
                <input name="dateStartWork" type="date" class="form-control" value="<?php echo $_POST["tdStartDate"] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Departman:</label>
                <select class="form-control" name="slctDepartment">
                    <option value="<?php echo $_POST["tdDepartment"] ?>"><?php echo $_POST["tdDepartment"] ?></option>
                    <?php
                    $departments = $cDepartments->getAll();
                    while ($value = $departments->fetch_assoc()) { ?>
                        <option value='<?php echo $value["name"] ?>'><?php echo $value["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Pozisyon:</label>
                <select class="form-control" name="slctPosition">
                    <option value="<?php echo $_POST["tdPosition"] ?>"><?php echo $_POST["tdPosition"] ?></option>
                    <?php
                    $positions = $cPositions->getAll();
                    while ($value = $positions->fetch_assoc()) { ?>
                        <option value='<?php echo $value["name"] ?>'><?php echo $value["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnUpdateStaff">Güncelle</button>
            <button type="submit" class="btn btn-primary" name="btnDeleteStaff">Sil</button>
        </form>
    </div>
</div>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>