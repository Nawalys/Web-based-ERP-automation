<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
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
            <th scope="col">İD</th>
            <th scope="col">Tc</th>
            <th scope="col">Ad</th>
            <th scope="col">Soyad</th>
            <th scope="col">Doğum Tarihi</th>
            <th scope="col">Cinsiyet</th>
            <th scope="col">Telefon No</th>
            <th scope="col">Email</th>
            <th scope="col">Adres</th>
            <th scope="col">İse Giriş Tarihi</th>
            <th scope="col">Departman</th>
            <th scope="col">Pozisyon</th>
            <th scope="col">İşlemler</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $cStaff->getAll();
        while ($value = $result->fetch_assoc()) { ?>
            <tr>
                <form action="pduzenle.php" method="post">
                    <td scope="row"><input type="hidden" name="tdId" value="<?php echo $value["id"]; ?>"><?php echo $value["id"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdTc" value="<?php echo $value["tc"]; ?>"><?php echo $value["tc"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdName" value="<?php echo $value["name"]; ?>"><?php echo $value["name"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdSurname" value="<?php echo $value["surname"]; ?>"><?php echo $value["surname"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdBirthday" value="<?php echo $value["birthday"]; ?>"><?php echo $value["birthday"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdGender" value="<?php echo $value["gender"]; ?>"><?php echo $value["gender"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdPhoneNumber" value="<?php echo $value["phoneNumber"]; ?>"><?php echo $value["phoneNumber"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdEmail" value="<?php echo $value["email"]; ?>"><?php echo $value["email"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdAddress" value="<?php echo $value["address"]; ?>"><?php echo $value["address"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdStartDate" value="<?php echo $value["startDate"]; ?>"><?php echo $value["startDate"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdDepartment" value="<?php echo $value["department"]; ?>"><?php echo $value["department"]; ?></td>
                    <td scope="row"><input type="hidden" name="tdPosition" value="<?php echo $value["position"]; ?>"><?php echo $value["position"]; ?></td>
                    <td>
                        <button type="submit" class="btn btn-primary" name="btnOrganizeStaff">Düzenle</button>
                    </td>
                </form>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
if (!isset($_GET["plistele"])) {
    $_GET["plistele"] = "index";
}

if ($_GET["plistele"] == "basarili") { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: 'Personel başarıyla silindi.',
        })
    </script>
<?php } elseif ($_GET["plistele"] == "hata1") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Hataa..',
            text: 'Boş stun bırakılamaz.',
        })
    </script>
<?php } elseif ($_GET["plistele"] == "basarili2") { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: 'Personel başarıyla güncellendi'
        })
    </script>
<?php } ?>

<script src="/Otomasyon/pages/staff/js/tableSearch.js"></script>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>