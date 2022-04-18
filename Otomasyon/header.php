<?php
require_once "pages/login/process/login.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Otomasyon</title>
    <script src="/Otomasyon/js/jquery-3.6.0.min.js"></script>
    <script src="/Otomasyon/js/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="/Otomasyon/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/Otomasyon/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Otomasyon">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Heading -->
            <div class="sidebar-heading">
                İşlemler
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kayıt İşlemleri</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        $cStaff->tc = $_SESSION["tc"];
                        $result = $cStaff->sessionCheck();
                        $department = $result["department"];
                        if ($department == "Bilgi teknolojileri") { ?>
                            <a class="collapse-item" href="/Otomasyon/pages/staff/kayit.php">Personel Kayıt</a>
                            <a class="collapse-item" href="/Otomasyon/pages/addData/verikayit.php">Veri Giriş</a>
                            <a class="collapse-item" href="/Otomasyon/pages/staffCertificate/pserekle.php">Personele Sertifika Ekle</a>
                            <a class="collapse-item" href="/Otomasyon/pages/examination/muayeneolustur.php">Muayene oluştur</a>
                            <a class="collapse-item" href="/Otomasyon/pages/training/egitimolustur.php">Eğitim oluştur</a>
                        <?php } elseif ($department == "İnsan kaynakları") { ?>
                            <a class="collapse-item" href="/Otomasyon/pages/staff/kayit.php">Personel Kayıt</a>
                            <a class="collapse-item" href="/Otomasyon/pages/staffCertificate/pserekle.php">Personele Sertifika Ekle</a>
                        <?php } elseif ($department == "Revir") { ?>
                            <a class="collapse-item" href="/Otomasyon/pages/examination/muayeneolustur.php">Muayene oluştur</a>
                        <?php } elseif ($department == "Kalite kontrol") { ?>
                            <a class="collapse-item" href="/Otomasyon/pages/training/egitimolustur.php">Eğitim oluştur</a>
                        <?php } elseif ($department == "Bakım onarım") { ?>

                        <?php } ?>
                    </div>
                </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Listeleme İşlemleri</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Listeleme işlemleri:</h6>

                        <?php if ($department == "Bilgi teknolojileri") { ?>
                            <a class="collapse-item" href="/Otomasyon/pages/staff/plistele.php">Personelleri Listele</a>
                            <a class="collapse-item" href="/Otomasyon/pages/staffCertificate/pserlistele.php">Personel Ser. Listele</a>
                            <a class="collapse-item" href="/Otomasyon/pages/examination/muayenelistele.php">Muayeneleri Listele</a>
                            <a class="collapse-item" href="/Otomasyon/pages/examination/muayenetakip.php">Muayene takip</a>
                            <a class="collapse-item" href="/Otomasyon/pages/training/egitimlistele.php">Eğitimleri Listele</a>
                        <?php } elseif ($department == "İnsan kaynakları") { ?>
                            <a class="collapse-item" href="/Otomasyon/pages/staff/plistele.php">Personelleri Listele</a>
                            <a class="collapse-item" href="/Otomasyon/pages/staffCertificate/pserlistele.php">Personel Ser. Listele</a>
                        <?php } elseif ($department == "Revir") { ?>
                            <a class="collapse-item" href="/Otomasyon/pages/staffCertificate/pserlistele.php">Personel Ser. Listele</a>
                            <a class="collapse-item" href="/Otomasyon/pages/examination/muayenelistele.php">Muayeneleri Listele</a>
                            <a class="collapse-item" href="/Otomasyon/pages/examination/muayenetakip.php">Muayene takip</a>
                        <?php } elseif ($department == "Kalite kontrol") { ?>
                            <a class="collapse-item" href="/Otomasyon/pages/staffCertificate/pserlistele.php">Personel Ser. Listele</a>
                            <a class="collapse-item" href="/Otomasyon//pages/training/egitimlistele.php">Eğitimleri Listele</a>
                        <?php } elseif ($department == "Bakım onarım") { ?>

                        <?php } ?>
                    </div>
                </div>
            </li>
            <?php if ($department == "Bilgi teknolojileri") { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/Otomasyon/pages/technicalSupport/teknikDestek.php">
                        <span>Teknik Destek</span></a>
                </li>
            <?php } ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>




        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hoş Geldiniz Sayın: <?php echo $result["name"] . " " . $result["surname"]; ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="collapse-item" href="/Otomasyon/pages/changePassword/sifredegis.php"><button class="dropdown-item">Şifre Değiştir</button></a>
                                <form action="/Otomasyon/pages/login/process/login.php" method="post" class="user">
                                    <button type="submit" class="dropdown-item" name="btnLogout" id="giris">Çıkış yap</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->