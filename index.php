<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>La Mise Au Vert - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/library/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/library/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/library/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/library/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/library/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/library/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/sailor_style.css" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<?php include 'app/includes/navbar.php' ?>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(assets/img/bg.jpg)">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Bienvenue à <span>la mise au vert</span></h2>
                        <p class="animate__animated animate__fadeInUp">
                            Depuis 1976, nous accueillons vos compagnons dans nos pensions pour chien et chats dans un environnement agréable à la campagne.
                        </p>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Plus d'infos</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row content">
                <div class="col-lg-6">
                    <h2>La Mise Au Vert</h2>
                    <h3>Pour des pensions de qualité</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        Depuis 1976, nous accueillons vos compagnons dans nos pensions pour chien et chats dans un environnement agréable à la campagne.
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> 11 Site
                        </li>
                        <li><i class="ri-check-double-line"></i> Plusieurs Service
                        </li>
                        <li><i class="ri-check-double-line"></i> Au Meilleur Prix
                        </li>
                    </ul>
                    <p class="fst-italic">
                        Vous pouvez nous confiez vos animaux en toute tranquilité .
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

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


<!-- ======= Footer ======= -->
<?php include 'app/includes/footer.php' ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
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
