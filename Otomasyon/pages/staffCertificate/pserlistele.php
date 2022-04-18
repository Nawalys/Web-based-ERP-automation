<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/header.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/classes/staffCertificates.php");
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
      <th scope="col">İd</th>
      <th scope="col">Personel Adı ve Soyadı</th>
      <th scope="col">Personel Tc'si</th>
      <th scope="col">Sertifika Sayısı</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = $cStaffCertificates->listStaffCertificate($department);
    while ($value = $result->fetch_assoc()) { ?>  
      <tr>
        <form action="pserdetay.php" method="post">
          <td scope="row"><?php echo $value["id"]; ?></td>
          <td scope="row"><?php echo $value["staffName"] . " " . $value["staffSurname"]; ?></td>
          <td scope="row"><input type="hidden" name="tdId" value="<?php echo $value["staffId"]; ?>"><?php echo $value["staffTc"]; ?></td>
          <td scope="row"><?php echo $value["certificateName"]; ?></td>
          <td scope="row">
            <button type="submit" class="btn btn-primary" name="btnListStaff">Detay</button>
          </td>
        </form>
      </tr>
    <?php } ?>
  </tbody>
</table>
<script src="/Otomasyon/pages/staffCertificate/js/tableSearch.js"></script>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Otomasyon/footer.php"); ?>