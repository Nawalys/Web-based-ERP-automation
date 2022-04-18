<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staff.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/supports.php");


//personelin gerekli bilgilerini kullanmak için
session_start();
$cStaff->tc = $_SESSION["tc"];
$result = $cStaff->sessionCheck();

//formdan gelen veriler
$subject = $_POST["txtSubject"];
$explanation = $_POST["txtExplanation"];
$password = $_POST["txtPassword"];

if ($subject == "" || $explanation == "" || $password == "") { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Eksik bilgi',
            text: 'Girilen değerler boş olamaz!!',
        });
    </script>
    <?php } else {
    //teknik destek talebi oluşturmak için
    $id = $result["id"];
    $cSupports->staffId = $id;
    $cSupports->subject = $subject;
    $cSupports->explanation = $explanation;
    $cSupports->addNewSupport();
}

?>

<!-- yeni tabloyu döndürüyoruz -->
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