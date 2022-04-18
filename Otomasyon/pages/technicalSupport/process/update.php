<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/supports.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
session_start();

$cStaff->tc = $_SESSION["tc"];
$result = $cStaff->sessionCheck();
$tid = $result["id"];


$id = $_POST["id"];

$cSupports->situation = "Onaylandı";
$cSupports->technicalStaffId = $tid;
$cSupports->id = $id;
$cSupports->updateSupport();


?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">İd</th>
            <th scope="col">Gönderen personel</th>
            <th scope="col">İlgilenen personel</th>
            <th scope="col">Konu</th>
            <th scope="col">Açıklama</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $cSupports->allSupportList();
        while ($value = $result->fetch_assoc()) { ?>
            <tr>
                <td scope="row"><?php echo $value["id"]; ?></td>
                <td scope="row"><?php echo $value["stfName"] . " " . $value["stfSurname"]; ?></td>
                <td scope="row"><?php echo $value["tstName"] . " " . $value["tstSurname"]; ?></td>
                <td scope="row"><?php echo $value["subject"]; ?></td>
                <td scope="row"><?php echo $value["explanation"]; ?></td>
                <td scope="row"><?php echo $value["situation"]; ?></td>
                <td>
                    <?php if ($value["situation"] != "Onaylandı") { ?>
                        <button type="button" value="<?php echo $value["id"]; ?>" class="btn btn-primary confirm" name="btnConfirm">Onayla</button>
                    <?php } else { ?>
                        <button type="button" value="<?php echo $value["id"]; ?>" class="btn btn-primary delete" name="btnDelete">Bitir</button>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


