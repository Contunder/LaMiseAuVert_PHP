<?php
session_start();

if ($_SESSION['Role'] === 'ADMIN' || $_SESSION['Role'] === $_GET['pen']) {

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>La Mise Au Vert - Modifier la pension de <?= $_GET['pen'] ?></title>
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
                <h2><?php if (isset($_GET['pen'])){ echo $_GET['pen']; }?></h2>
                <ol>
                    <li><a href="index.php">Index</a></li>
                    <li>Modifier</li>
                    <li>Pension</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Pension Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <?php if (isset($_GET['pen'])) {
            include '../../app/db_conn.php';
            include '../../app/helpers/pension.php';
            $pen = getPension($_GET['pen'] ,$conn); }
            else{ $pen=''; }

            if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo htmlspecialchars($_GET['error']);?>
                </div>
            <?php } if ($pen !== '') { ?>
            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry">
                        <form method="post" action="../../app/update/pension.php" enctype="multipart/form-data">

                            <div class="entry-img">
                                <img src="../../<?= $pen['Image'] ?>" alt="" class="img-fluid">
                            </div>

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
                                        Description :
                                    </div>
                                    <div class="col">
                                        <textarea type="text" class="form-control" name="Description" placeholder="<?= $pen['Description'] ?>"></textarea>
                                    </div>
                                </div>
                                </p>

                                <p>
                                <div class="row g-2">
                                    <div class="col">
                                        <i class="bi bi-geo-alt"></i> Adresse :
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="Adresse" value="<?= $pen['Adresse'] ?>">
                                    </div>
                                </div>
                                </p>

                                <p>
                                <div class="row g-2">
                                    <div class="col">
                                        <i class="bi bi-people"></i> Résponsable :
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="Responsable" value="<?= $pen['Responsable'] ?>">
                                    </div>
                                </div>
                                </p>

                                <p>
                                <div class="row g-2">
                                    <div class="col">
                                        <i class="bi bi-phone"></i> Télèphone :
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="Telephone" value="<?= $pen['Telephone'] ?>">
                                    </div>
                                </div>
                                </p>

                                <p>
                                <div class="row g-2">
                                    <div class="col">
                                        <label class="form-label">
                                            Photo :</label>
                                    </div>
                                    <div class="col">
                                        <input type="file"
                                               class="form-control"
                                               name="PP">
                                    </div>
                                </div>
                                </p>

                                <div class="read-more">
                                    <a href="../../pension.php?pen=<?= $pen['Ville'] ?>">Annuler</a>
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                            </div>
                        </form>

                    </article><!-- End pension entry -->

                </div><!-- End pension entries list -->

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

                        </article><!-- End pension entry -->

                    </div><!-- End pension entries list -->
                    <?php }  ?>

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Autres Pension</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <li><a href="../../pension.php?pen=Lambertsart">Lambertsart</a></li>
                                    <li><a href="../../pension.php?pen=Vincennes">Vincennes</a></li>
                                    <li><a href="../../pension.php?pen=Les Echets">Les Echets</a></li>
                                    <li><a href="../../pension.php?pen=Saran">Saran</a></li>
                                    <li><a href="../../pension.php?pen=Coulmiers">Coulmiers</a></li>
                                    <li><a href="../../pension.php?pen=Norges la ville">Norges la ville</a></li>
                                    <li><a href="../../pension.php?pen=Landujan">Landujan</a></li>
                                    <li><a href="../../pension.php?pen=Ormes">Ormes</a></li>
                                    <li><a href="../../pension.php?pen=Lezoux">Lezoux</a></li>
                                    <li><a href="../../pension.php?pen=Vabres l’Abbaye">Vabres l’Abbaye</a></li>
                                    <li><a href="../../pension.php?pen=Saint Sauveur">Saint Sauveur</a></li>
                                </ul>
                            </div><!-- End sidebar pension-->

                        </div><!-- End sidebar -->

                    </div><!-- End pension sidebar -->

                </div>

            </div>
    </section><!-- End pension Section -->

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
<?php
}else{
    header("Location: ../../pension.php");
    exit;
}
?>