<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>La Mise Au Vert - Prix <?= $_GET['pen'] ?></title>
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

<!-- ======= Header ======= -->
<?php include 'app/includes/navbar.php' ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>
                    <?php if (isset($_GET['pen'])){
                        if ($_SESSION['Role'] === 'ADMIN') { ?>
                        <a href="admin/create/prix.php?pen=<?=$_GET['pen']?>"><i class="bi bi-plus-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Crée"></i></a>
                    <?php }
                        if ($_SESSION['Role'] === 'ADMIN' || $_SESSION['Role'] === $_GET['pen']) { ?>
                            <a href="admin/edit/prix.php?pen=<?php if (isset($_GET['pen'])){ echo $_GET['pen']; }?>"><i class="bi bi-arrow-up-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Modifier"></i></a>
                        <?php } echo $_GET['pen']; }
                    else { echo 'Tout nos Prix'; }?>
                </h2>
                <ol>
                    <li><a href="index.php">Index</a></li>
                    <li>Prix</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

        <main id="main">

            <!-- ======= Pension Section ======= -->
            <section id="pricing" class="pricing">
                <div class="container">

                    <div class="row">
                        <?php if (isset($_GET['pen'])) {
                            include 'app/db_conn.php';
                            include 'app/helpers/prix.php';
                            $prixPension = getPrix($_GET['pen'], "Pension Feline" ,$conn);
                            $prixCamping = getPrix($_GET['pen'], "Camping Canin" ,$conn);
                            $prixHotel = getPrix($_GET['pen'], "Hotel Canin" ,$conn);
                        }
                            else{ $prixPension =''; } ?>
                        <?php if ($prixPension !== '') { ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="box">
                                    <h3>Pension féline</h3>
                                    <h4><?= $prixPension['Tarif'] ?> <sup>€</sup><span> / jour</span></h4>
                                    <ul>
                                        <li>Aménagé comme à la maison</li>
                                        <li>Différents parcours aménagés</li>
                                        <li><a href="services.php">Plus d'infos..</a></li>
                                    </ul>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">Réserver Maintenant</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                                <div class="box">
                                    <h3>Camping canin</h3>
                                    <h4><?= $prixCamping['Tarif'] ?> <sup>€</sup><span> / jour</span></h4>
                                    <ul>
                                        <li>Niches individuelles</li>
                                        <li>Grand jardin commun</li>
                                        <li><a href="services.php">Plus d'infos..</a></li>
                                    </ul>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">Réserver Maintenant</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                                <div class="box">
                                    <h3>Hôtel canin</h3>
                                    <h4><?= $prixHotel['Tarif'] ?> <sup>€</sup><span> / jour</span></h4>
                                    <ul>
                                        <li>Box intérieur chauffé</li>
                                        <li>Cour privative</li>
                                        <li><a href="services.php">Plus d'infos..</a></li>
                                    </ul>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">Réserver Maintenant</a>
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0 w-50 m-5">
                                <div class="box">
                                    <h3>Pension non trouvé</h3>
                                    <h4>La pension que vous chercher n'est pas touver</h4>
                                </div>
                            </div>

                        <?php } ?>


                        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                            <div class="box">
                                <h3 class="sidebar-title">Autres Pension</h3>
                                <div class="sidebar-item categories">
                                    <ul>
                                        <li><a href="prix.php?pen=Lambertsart">Lambertsart</a></li>
                                        <li><a href="prix.php?pen=Vincennes">Vincennes</a></li>
                                        <li><a href="prix.php?pen=Les Echets">Les Echets</a></li>
                                        <li><a href="prix.php?pen=Saran">Saran</a></li>
                                        <li><a href="prix.php?pen=Coulmiers">Coulmiers</a></li>
                                        <li><a href="prix.php?pen=Norges la ville">Norges la ville</a></li>
                                        <li><a href="prix.php?pen=Landujan">Landujan</a></li>
                                        <li><a href="prix.php?pen=Ormes">Ormes</a></li>
                                        <li><a href="prix.php?pen=Lezoux">Lezoux</a></li>
                                        <li><a href="prix.php?pen=Vabres l’Abbaye">Vabres l’Abbaye</a></li>
                                        <li><a href="prix.php?pen=Saint Sauveur">Saint Sauveur</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div><!-- End Pricing Section -->

                </div>

            </section><!-- End prix Section -->

        </main><!-- End #main -->
        <!-- ======= Pricing Section ======= -->


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