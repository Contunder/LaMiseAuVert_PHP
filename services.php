<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>La Mise Au Vert - Services</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- library CSS Files -->
    <link href="assets/library/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/library/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/library/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/library/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/library/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/library/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/sailor_style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Sailor - v4.7.0
    * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<?php include 'app/includes/navbar.php' ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Services</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Services</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title">
                <h2>Services</h2>
                <p>Voir nos offres</p>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Hotel Canin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Camping Canin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pension Féline</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Nos Hotel Canin</h3>
                                    <p class="fst-italic">L’hôtel canin, c’est la solution confort pour votre chien ! Il pourra évoluer à sa convenance dans son espace intérieur et sa cour privative.</p>
                                    <p>Cet hébergement a été étudié pour convenir à tous types de chien.
                                        Le box intérieur chauffé et son parcours extérieur de 15 à 25 m2.
                                        Cet hébergement est idéal en hiver et pour les séjours court
                                        ou longue durée afin de leur permettre de s’abriter après une
                                        longue partie de jeu, et se reposer dans un espace « comme à
                                        la maison ».
                                    </p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/features-1.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Camping Canin</h3>
                                    <p class="fst-italic">Le camping canin se compose de niches individuelles et d’un grand jardin commun où vos chiens pour- ront se défouler à volonté.</p>
                                    <p>L’atout de cet hébergement est la possibilité pour votre chien
                                        d’être au contact des autres animaux tout en gardant son
                                        espace individuel.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/features-2.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-3">
                            <div class="row">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Pension Féline</h3>
                                    <p class="fst-italic">Nos espaces félins sont étudiés pour répondre aux besoins de nos amis chats. Nous leurs avons préparé des petits cocons douillés et chauffés au sein d’un espace de 50m2 aménagé comme à la maison avec petit mobilier et décoration.</p>
                                    <p>Ils bénéficient de calme et de tranquillité avec une ambiance musicale.
                                        Nos amis les chats peuvent se promener le long des différents parcours aménagés : arbres à chat géants, passerelles, ponts, cordes, planches grattoirs.
                                        Pour son bien-être toutes les règles d’hygiène sont respectées,
                                        il est aussi essentiel de leurs donner une alimentation riche et
                                        équilibré. C’est pourquoi, nous sommes partenaires Proplan.</p>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/features-3.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="icon-box">
                        <i class="bi bi-egg"></i>
                        <h4><a href="#">Nourriture saine</a></h4>
                        <p>Vos animaux seront nourris avec de la nourriture saine et entièrement bio.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="bi bi-activity"></i>
                        <h4><a href="#">Santé</a></h4>
                        <p>Nous proposons aussi de réaliser la
                            mise a jour des vaccins de votre animal.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="bi bi-heart"></i>
                        <h4><a href="#">Hygiène</a></h4>
                        <p>Nous lavons votre chien avant son départ.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="bi bi-house"></i>
                        <h4><a href="#">Transport animaliers</a></h4>
                        <p>Nous transportons vos animaux de
                            chez vous a chez nous.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="bi bi-cloud-sun"></i>
                        <h4><a href="#">Promenade</a></h4>
                        <p>Votre animal auras le droit a une heure de balade dans un parc de détente.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="bi bi-people"></i>
                        <h4><a href="#">Personnel</a></h4>
                        <p>Notre personnel veilleras
                            a ce que votre animal ne manque de rien.</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include 'app/includes/footer.php' ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- library JS Files -->
<script src="assets/library/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/library/glightbox/js/glightbox.min.js"></script>
<script src="assets/library/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/library/swiper/swiper-bundle.min.js"></script>
<script src="assets/library/waypoints/noframework.waypoints.js"></script>
<script src="assets/library/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>