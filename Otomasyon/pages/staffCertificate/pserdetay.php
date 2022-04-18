<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staffCertificates.php");
?>

<table class="table">
    <thead>
        <tr>
            <?php
            $id = isset($_POST["tdId"]) ? $_POST["tdId"] : null;
            $cStaffCertificates->staffId = $id;
            $result = $cStaffCertificates->listStaffCertificateDetail($department);
            $value = $result->fetch_assoc();
            ?>
            <th scope="col">Sertifika İd</th>
            <th scope="col"><b><u><?php echo $value["staffName"] . " " . $value["staffSurname"] ?></b></u> isimli personelin sertifikaları</th>
            <th scope="col">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result2 = $cStaffCertificates->listStaffCertificateDetail($department);
        while ($value = $result2->fetch_assoc()) { ?>
            <tr>
                <td scope="row"><?php echo $value["id"]; ?></td>
                <td scope="row"><?php echo $value["certificateName"]; ?></td>
                <td><button type="button" deleteId="<?php echo $value["id"]; ?>" class="btn btn-primary delete">Sil</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script src="/Otomasyon/pages/staffCertificate/js/delete.js"></script>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>