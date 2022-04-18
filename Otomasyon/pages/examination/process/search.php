<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");

if (isset($_GET["term"])) {
    $value = $_GET["term"];
    $cStaff->searchStaff($value);
}

?>