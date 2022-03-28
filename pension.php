<?php

session_start();

include 'app/db_conn.php';
include 'app/helpers/pension.php';
if (isset($_SESSION['Email'])) {
    $pension = getPension($_SESSION['Role'], $conn);
}else{ $pension = '';
    $_SESSION['Role'] = '';
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>La Mise Au Vert - Pension de <?= $_GET['pen'] ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Library CSS Files -->
    <link href="assets/library/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/library/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/library/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/library/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/library/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/library/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- CSS File -->
    <link href="assets/css/sailor_style.css" rel="stylesheet">

</head>

<body>

<!-- header -->
<?php include 'app/includes/navbar.php' ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>
                    <?php if ($_SESSION['Role'] === 'ADMIN') { ?>
                    <a href="admin/create/pension.php"><i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Crée"></i></a>
                    <?php } if (isset($_GET['pen'])){
                    if ($_SESSION['Role'] === 'ADMIN' || $_SESSION['Role'] === $_GET['pen']) { ?>
                    <a href="admin/edit/pension.php?pen=<?php if (isset($_GET['pen'])){ echo $_GET['pen']; }?>"><i class="bi bi-arrow-up-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Modifier"></i></a>
                    <?php } echo $_GET['pen']; }
                    else { echo 'Toutes nos Pensions'; }?>
                </h2>
                <ol>
                    <li><a href="index.php">Index</a></li>
                    <li>Pension</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Pension Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-8 entries">
            <?php if (isset($_GET['pen'])) {
            $pen = getPension($_GET['pen'] ,$conn);

            if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo htmlspecialchars($_GET['error']);?>
                </div>
            <?php } if ($pen !== '') { ?>

                    <article class="entry">

                        <div class="entry-img">
                            <img src="<?= $pen['Image'] ?>" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="blog-single.html">Notre Pension de <?= $pen['Ville'] ?></a>
                        </h2>

                        <div class="entry-content">
                            <p>
                                <?= $pen['Description'] ?>
                            </p>

                            <p><i class="bi bi-geo-alt"></i> <?= $pen['Adresse'] ?></p>

                            <p><i class="bi bi-people"></i> <?= $pen['Responsable'] ?></p>

                            <p><i class="bi bi-phone"></i> <?= $pen['Telephone'] ?></p>

                            <div class="read-more">
                                <a href="prix.php?pen=<?= $pen['Ville'] ?>">Prix</a>
                                <!--<a href="reserver.php?pen=<?= $pen['Ville'] ?>">Réserver</a>-->
                            </div>
                        </div>

                    </article><!-- End pension entry -->

                <?php } else { ?>
                    <article class="entry">

                        <h2 class="entry-title">
                            <a href="pension.php">Pension non trouvé !</a>
                        </h2>

                        <div class="entry-content">
                            <p>
                                La pension n'existe pas !
                            </p>
                        </div>

                    </article><!-- End pension entry -->
                    <?php } } else {
                    $pensions = getAllPension($conn);
                    foreach ($pensions as $pen) { ?>
                    <article class="entry">

                        <div class="entry-img">
                            <img src="<?= $pen['Image'] ?>" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="pension.php?pen=<?= $pen['Ville'] ?>">Notre Pension de <?= $pen['Ville'] ?></a>
                        </h2>

                        <div class="entry-content">
                            <p>
                                <?= $pen['Description'] ?>
                            </p>

                            <p><i class="bi bi-geo-alt"></i> <?= $pen['Adresse'] ?></p>

                            <p><i class="bi bi-people"></i> <?= $pen['Responsable'] ?></p>

                            <p><i class="bi bi-phone"></i> <?= $pen['Telephone'] ?></p>

                            <div class="read-more">
                                <a href="prix.php?pen=<?= $pen['Ville'] ?>">Prix</a>
                                <!--<a href="reserver.php?pen=<?= $pen['Ville'] ?>">Réserver</a>-->
                            </div>
                        </div>

                    </article><!-- End pension entry -->
                    <?php } } ?>
                    </div><!-- End pension entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Autres Pension</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <li><a href="pension.php?pen=Lambertsart">Lambertsart</a></li>
                                    <li><a href="pension.php?pen=Vincennes">Vincennes</a></li>
                                    <li><a href="pension.php?pen=Les Echets">Les Echets</a></li>
                                    <li><a href="pension.php?pen=Saran">Saran</a></li>
                                    <li><a href="pension.php?pen=Coulmiers">Coulmiers</a></li>
                                    <li><a href="pension.php?pen=Norges la ville">Norges la ville</a></li>
                                    <li><a href="pension.php?pen=Landujan">Landujan</a></li>
                                    <li><a href="pension.php?pen=Ormes">Ormes</a></li>
                                    <li><a href="pension.php?pen=Lezoux">Lezoux</a></li>
                                    <li><a href="pension.php?pen=Vabres l’Abbaye">Vabres l’Abbaye</a></li>
                                    <li><a href="pension.php?pen=Saint Sauveur">Saint Sauveur</a></li>
                                </ul>
                            </div><!-- End sidebar pension-->

                        </div><!-- End sidebar -->

                    </div><!-- End pension sidebar -->

                </div>

            </div>
    </section><!-- End pension Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include 'app/includes/footer.php' ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Library JS Files -->
<script src="assets/library/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/library/glightbox/js/glightbox.min.js"></script>
<script src="assets/library/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/library/swiper/swiper-bundle.min.js"></script>
<script src="assets/library/waypoints/noframework.waypoints.js"></script>
<script src="assets/library/php-email-form/validate.js"></script>

<!-- JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>