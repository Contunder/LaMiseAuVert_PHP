<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>La Mise Au Vert - Modifier le prix de <?php if (isset($_GET['pen'])) {echo $_GET['pen'];} ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Library CSS Files -->
    <link href="../../assets/library/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/library/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/library/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/library/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/library/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/library/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- CSS File -->
    <link href="../../assets/css/sailor_style.css" rel="stylesheet">

</head>

<body>

<!-- header -->
<?php include '../includes/navbar.php' ?>


<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><?php if (isset($_GET['pen'])) {echo $_GET['pen'];} ?></h2>
                <ol>
                    <li><a href="index.php">Index</a></li>
                    <li>Modifier</li>
                    <li>Prix</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= prix Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <?php if (isset($_GET['pen'])) {
                include '../../app/db_conn.php';
                include '../../app/helpers/prix.php';

                $prixPension = getPrix($_GET['pen'], 'Pension Féline' ,$conn);
                $prixCamping = getPrix($_GET['pen'], 'Camping Canin' ,$conn);
                $prixHotel = getPrix($_GET['pen'], 'Hôtel Canin' ,$conn);
            }
            else{ $prixPension=''; }

            if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php } if ($prixPension !== '') { ?>
            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry">
                        <form method="post" action="../../app/update/prix.php" enctype="multipart/form-data">

                            <h2 class="entry-title">
                                <div class="row g-2">
                                    <div class="col">
                                        Pension de <?= $_GET['pen'] ?>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control visually-hidden" name="Ville" value="<?= $_GET['pen'] ?>">
                                    </div>
                                </div>
                            </h2>

                            <div class="entry-content">

                                <p>
                                <div class="row g-2">
                                    <div class="col">
                                        <i class="bi bi-house"></i> Pension Feline :
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="Pension" value="<?= $prixPension['Tarif'] ?>">
                                    </div>
                                </div>
                                </p>

                                <p>
                                <div class="row g-2">
                                    <div class="col">
                                        <i class="bi bi-house"></i> Camping Canin :
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="Camping" value="<?= $prixCamping['Tarif'] ?>">
                                    </div>
                                </div>
                                </p>

                                <p>
                                <div class="row g-2">
                                    <div class="col">
                                        <i class="bi bi-house"></i> Hotel Canin :
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="Hotel" value="<?= $prixHotel['Tarif'] ?>">
                                    </div>
                                </div>
                                </p>

                                <div class="read-more">
                                    <a href="../../prix.php?pen=<?= $_GET['pen'] ?>">Annuler</a>
                                    <button type="submit" class="btn btn-primary">Modifer</button>
                                </div>
                            </div>
                        </form>

                    </article><!-- End prix entry -->

                </div><!-- End prix entries list -->

                <?php } else { ?>
                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry">

                            <h2 class="entry-title">
                                <a href="../../blog-single.html">Pension non trouvé !</a>
                            </h2>

                            <div class="entry-content">
                                <p>
                                    La pension n'existe pas !
                                </p>
                            </div>

                        </article><!-- End prix entry -->

                    </div><!-- End prix entries list -->
                    <?php }  ?>

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Autres Pension</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <li><a href="../../prix.php?pen=Lambertsart">Lambertsart</a></li>
                                    <li><a href="../../prix.php?pen=Vincennes">Vincennes</a></li>
                                    <li><a href="../../prix.php?pen=Les Echets">Les Echets</a></li>
                                    <li><a href="../../prix.php?pen=Saran">Saran</a></li>
                                    <li><a href="../../prix.php?pen=Coulmiers">Coulmiers</a></li>
                                    <li><a href="../../prix.php?pen=Norges la ville">Norges la ville</a></li>
                                    <li><a href="../../prix.php?pen=Landujan">Landujan</a></li>
                                    <li><a href="../../prix.php?pen=Ormes">Ormes</a></li>
                                    <li><a href="../../prix.php?pen=Lezoux">Lezoux</a></li>
                                    <li><a href="../../prix.php?pen=Vabres l’Abbaye">Vabres l’Abbaye</a></li>
                                    <li><a href="../../prix.php?pen=Saint Sauveur">Saint Sauveur</a></li>
                                </ul>
                            </div><!-- End sidebar prix-->

                        </div><!-- End sidebar -->

                    </div><!-- End prix sidebar -->

                </div>

            </div>
    </section><!-- End prix Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include '../includes/footer.php' ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Library JS Files -->
<script src="../../assets/library/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/library/glightbox/js/glightbox.min.js"></script>
<script src="../../assets/library/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../../assets/library/swiper/swiper-bundle.min.js"></script>
<script src="../../assets/library/waypoints/noframework.waypoints.js"></script>
<script src="../../assets/library/php-email-form/validate.js"></script>

<!-- JS File -->
<script src="../../assets/js/main.js"></script>

</body>

</html>