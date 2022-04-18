<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/departments.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/positions.php");
?>
<div class="d-flex justify-content-center">
    <div class="card w-50 ">
        <form action="process/insert.php" method="post">
            <div class="form-group">
                <label>Tc:</label>
                <input name="txtTc" type="text" class="form-control" placeholder="Tc girin">
            </div>
            <div class="form-group">
                <label>Ad:</label>
                <input name="txtName" type="text" class="form-control" placeholder="Adı girin">
            </div>
            <div class="form-group">
                <label>Soyad:</label>
                <input name="txtSurname" type="text" class="form-control" placeholder="Soyadı girin">
            </div>
            <div class="form-group">
                <label>Doğum tarihi:</label>
                <input name="dateBirthday" type="date" class="form-control">
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Cinsiyet:</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radGender" value="Erkek" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Erkek
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radGender" value="Kadın">
                            <label class="form-check-label" for="gridRadios2">
                                Kadın
                            </label>
                        </div>
                    </div>
            </fieldset>
            <div class="form-group">
                <label>Telefon no:</label>
                <input name="txtPhoneNumber" type="text" class="form-control" placeholder="Telefon no girin">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email:</label>
                <input type="email" name="txtEmail" class="form-control" aria-describedby="emailHelp" placeholder="Email girin">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Adres girin:</label>
                <textarea name="txtAddress" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>İşe giriş tarihi:</label>
                <input name="dateStartWork" type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Departman:</label>
                <select class="form-control" name="slctDepartment">
                    <?php
                    $departments = $cDepartments->GetAll();
                    while ($value = $departments->fetch_assoc()) { ?>
                        <option value='<?php echo $value["name"] ?>'><?php echo $value["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Pozisyon:</label>
                <select class="form-control" name="slctPosition">
                    <?php
                    $positions = $cPositions->GetAll();
                    while ($value = $positions->fetch_assoc()) { ?>
                        <option value='<?php echo $value["name"] ?>'><?php echo $value["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btnAddStaff" id="kaydet">Kaydet</button>
        </form>
    </div>
</div>
<?php
if (!isset($_GET["kayit"])) {
    $_GET["kayit"] = "index";
}

if ($_GET["kayit"] == "hata") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hataa...',
            text: 'Eklemek istediğiniz tc zaten mevcut.',
        })
    </script>
<?php } elseif ($_GET["kayit"] == "hata2") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hataa...',
            text: 'Boş stun bırakılamaz.',
        })
    </script>
<?php } elseif ($_GET["kayit"] == "basarili") { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: 'Personel kaydı başarıyla oluşturuldu.',
        })
    </script>
<?php } ?>
<br><br>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>