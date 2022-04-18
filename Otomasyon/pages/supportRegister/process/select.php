<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/supports.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">İd</th>
            <th scope="col">Durum</th>
            <th scope="col">Konu</th>
            <th scope="col">İlgilenen Personel</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id = $result["id"];
        $cSupports->staffId = $id;
        $rows = $cSupports->selfSupportList();
        while ($value = $rows->fetch_assoc()) { ?>
            <tr>
                <td scope="row"><?php echo $value["id"] ?></td>
                <td scope="row"><?php echo $value["situation"] ?></td>
                <td scope="row"><?php echo $value["subject"] ?></td>
                <td scope="row"><?php echo $value["name"] . " " . $value["surname"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>