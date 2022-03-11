<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="../../index.php">La Mise Au Vert</a></h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="../../index.php">Index</a></li>

                <li class="dropdown active"><a href="#"><span>Nos Pension</span> <i class="bi bi-chevron-down"></i></a>
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
                </li>
                <li><a href="../../services.php">Services</a></li>
                <li class="dropdown active"><a href="#"><span>Prix</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="../../prix.php?pen=Lambertsart">Lambertsart</a></li>
                        <li><a href="../../prix.php?pen=1">Vincennes</a></li>
                        <li><a href="../../prix.php?pen=1">Les Echets</a></li>
                        <li><a href="../../prix.php?pen=1">Saran</a></li>
                        <li><a href="../../prix.php?pen=1">Coulmiers</a></li>
                        <li><a href="../../prix.php?pen=1">Norges la ville</a></li>
                        <li><a href="../../prix.php?pen=1">Landujan</a></li>
                        <li><a href="../../prix.php?pen=1">Ormes</a></li>
                        <li><a href="../../prix.php?pen=1">Lezoux</a></li>
                        <li><a href="../../prix.php?pen=1">Vabres l’Abbaye</a></li>
                        <li><a href="../../prix.php?pen=1">Saint Sauveur</a></li>

                    </ul>
                </li>
                <li><a href="../../contact.php">Contact</a></li>

                <?php if (isset($_SESSION['Email'])) { ?>
                    <li><a href="../../account.php" class="getstarted">Mon Compte</a></li>
                <?php } else { ?>
                    <li><a href="../../connect.php" class="getstarted">Se Connecter</a></li>
                <?php } ?>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->