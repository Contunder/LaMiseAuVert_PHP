<?php
session_start();

if ($_SESSION['Role'] === 'ADMIN') {

    include 'app/db_conn.php';
    include 'app/helpers/pension.php';
    include 'app/helpers/animal.php';

    $pension = getPension($_SESSION['Role'], $conn);
    $animals = getMyAnimal($_SESSION['Id'], $conn);
    $chiens = getAllDogEspece($conn);
    $chats = getAllCatEspece($conn);

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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
              rel="stylesheet">

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
                    <h2>Compte</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Compte</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title">
                    <h2>Compte <?php echo $_SESSION['Role']; ?></h2>
                    <p><?= $_SESSION['Nom'] ?> <?= $_SESSION['Prenom'] ?></p>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Mes Informations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Mon Animal</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/create/pension.php">Crée une Pension</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Modifier une Pension</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-7">Crée un Tarif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Modifier un Prix</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-6">Information Client</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Crée Un Compte Pension</a>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Deconnection</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">


                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Mes Informations</h3>
                                        <?php if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <?php echo htmlspecialchars($_GET['error']); ?>
                                            </div>
                                        <?php } ?>


                                        <?php if (isset($_GET['success'])) { ?>
                                            <div class="alert alert-success" role="alert">
                                                <?php echo htmlspecialchars($_GET['success']); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="mb-3">
                                            <label class="form-label" for="Nom">
                                                Nom</label>
                                            <input type="text"
                                                   name="Nom"
                                                   id="Nom"
                                                   value="<?= $_SESSION['Nom'] ?>"
                                                   class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="Prenom">
                                                Prénom</label>
                                            <input type="text"
                                                   name="Prenom"
                                                   id="Prenom"
                                                   value="<?= $_SESSION['Prenom'] ?>"
                                                   class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="Adresse">
                                                Adresse</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="Adresse"
                                                   value="<?= $_SESSION['Adresse'] ?>"
                                                   name="Adresse">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="Telephone">
                                                Télèphone</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="Telephone"
                                                   value="<?= $_SESSION['Telephone'] ?>"
                                                   name="Telephone">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="Email">
                                                Email</label>
                                            <input type="email"
                                                   name="Email"
                                                   id="Email"
                                                   value="<?= $_SESSION['Email'] ?>"
                                                   class="form-control">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Mon Animal</h3>
                                        <?php if ($animals != '') { foreach ($animals as $animal) {?>
                                            <form method="post" action="app/update/animal.php">

                                                <?php if (isset($_GET['erreur'])) { ?>
                                                    <div class="alert alert-warning" role="alert">
                                                        <?php echo htmlspecialchars($_GET['erreur']); ?>
                                                    </div>
                                                <?php } ?>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Nom">
                                                        Nom</label>
                                                    <input type="text"
                                                           name="Nom"
                                                           id="Nom"
                                                           value="<?= $animal['NomAnimal'] ?>"
                                                           class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Espece">
                                                        Espece</label>
                                                    <select class="form-select chosen-select" id="Espece" name="Espece" >
                                                        <option><?= $animal['Libelle'] ?></option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                            </form><br>

                                                                            <?php } }  ?>
                                            <form method="post" action="app/http/add_animal.php" >

                                                <?php if (isset($_GET['erreur'])) { ?>
                                                    <div class="alert alert-warning" role="alert">
                                                        <?php echo htmlspecialchars($_GET['erreur']); ?>
                                                    </div>
                                                <?php }
                                                if (isset($_GET['Nom'])) {
                                                    $nom = $_GET['Nom'];
                                                } else $nom = '';

                                                if (isset($_GET['Espece'])) {
                                                    $espece = $_GET['Espece'];
                                                } else $espece = '';

                                                ?>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Nom">
                                                        Nom</label>
                                                    <input type="text"
                                                           name="Nom"
                                                           id="Nom"
                                                           value="<?= $nom ?>"
                                                           class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Espece">
                                                        Espece</label>
                                                    <select class="form-select chosen-select" id="Espece" name="Espece">
                                                        <option disabled="disabled">----Chien----</option>
                                                        <?php foreach ($chiens as $chien) { ?>
                                                            <option><?= $chien['Libelle'] ?></option>
                                                        <?php } ?>
                                                        <option disabled="disabled">----Chat----</option>
                                                        <?php foreach ($chats as $chat) { ?>
                                                            <option><?= $chat['Libelle'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                            </form><br>

                                            <form method="post" action="app/create/espece.php">
                                                <h3>Ajouter une éspece</h3>
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <label for="selectAnimal">Choix de l'animal</label>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <select class="form-select" id="selectAnimal" name="Animal">
                                                                <option>Chien</option>
                                                                <option>Chat</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <label for="Espece">Ajout de l'espece</label>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <input type="text"
                                                                   name="Espece"
                                                                   id="Espece"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                                <?php $pensions = getAllPension($conn); ?>
                                <div class="tab-pane" id="tab-3">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <form method="get" action="admin/edit/pension.php">
                                                <h3>Modifier une Pension</h3>
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <label for="selectPension">Choix de la pension</label>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <select class="form-select" id="selectPension" name="pen">
                                                                <?php foreach ($pensions as $pen) { ?>
                                                                    <option><?= $pen['Ville'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Allez a la page</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab-7">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <form method="get" action="admin/create/prix.php">
                                                <h3>Crée un Prix</h3>
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <label for="selectPension">Choix de la pension</label>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <select class="form-select" id="selectPension" name="pen">
                                                                <?php foreach ($pensions as $pen) { ?>
                                                                    <option><?= $pen['Ville'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Allez a la page</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab-4">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <form method="get" action="admin/edit/prix.php">
                                                <h3>Modifier un Prix</h3>
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <label for="selectPension">Choix de la pension</label>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <select class="form-select" id="selectPension" name="pen">
                                                                <?php foreach ($pensions as $pen) { ?>
                                                                    <option><?= $pen['Ville'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Allez a la page</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab-5">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3>Crée un compte pension</h3>
                                            <form method="post" action="app/http/signup.php"
                                                  enctype="multipart/form-data">
                                                <?php if (isset($_GET['erreur'])) { ?>
                                                    <div class="alert alert-warning" role="alert">
                                                        <?php echo htmlspecialchars($_GET['erreur']); ?>
                                                    </div>
                                                <?php }
                                                if (isset($_GET['Nom'])) {
                                                    $nom = $_GET['Nom'];
                                                } else $nom = '';

                                                if (isset($_GET['Prenom'])) {
                                                    $prenom = $_GET['Prenom'];
                                                } else $prenom = '';

                                                if (isset($_GET['Adresse'])) {
                                                    $adresse = $_GET['Adresse'];
                                                } else $adresse = '';

                                                if (isset($_GET['Telephone'])) {
                                                    $telephone = $_GET['Telephone'];
                                                } else $telephone = '';

                                                if (isset($_GET['Email'])) {
                                                    $email = $_GET['Email'];
                                                } else $email = '';

                                                ?>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Nom">
                                                        Nom</label>
                                                    <input type="text"
                                                           name="Nom"
                                                           id="Nom"
                                                           value="<?= $nom ?>"
                                                           class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Prenom">
                                                        Prénom</label>
                                                    <input type="text"
                                                           name="Prenom"
                                                           id="Prenom"
                                                           value="<?= $prenom ?>"
                                                           class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Pension">
                                                        Pension</label>
                                                    <select class="form-select" id="selectPension" name="Pension"
                                                            id="Pension">
                                                        <?php foreach ($pensions as $pen) { ?>
                                                            <option><?= $pen['Ville'] ?></option>
                                                        <?php } ?>
                                                        <option>ADMIN</option>
                                                        <option>USER</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Adresse">
                                                        Adresse</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           id="Adresse"
                                                           value="<?= $adresse ?>"
                                                           name="Adresse">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Telephone">
                                                        Télèphone</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           id="Telephone"
                                                           value="<?= $telephone ?>"
                                                           name="Telephone">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="Email">
                                                        Email</label>
                                                    <input type="email"
                                                           name="Email"
                                                           id="Email"
                                                           value="<?= $email ?>"
                                                           class="form-control">
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label" for="Password">
                                                        Mot de Passe</label>
                                                    <input type="password"
                                                           class="form-control"
                                                           id="Password"
                                                           name="Password">
                                                </div>


                                                <button type="submit" class="btn btn-primary">S'enregistrer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab-6">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3>Information Client</h3>
                                            <div class="input-group mb-3">
                                                <input type="text" placeholder="Rechercher..." id="searchText" class="form-control">
                                                <button class="btn btn-primary" id="serachBtn"> <i class="bi bi-search"></i> </button>
                                            </div>
                                            <ul id="chatList" class="list-group mvh-50 overflow-auto">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include 'app/includes/footer.php' ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

    <!-- library JS Files -->
    <script src="assets/library/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/library/glightbox/js/glightbox.min.js"></script>
    <script src="assets/library/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/library/swiper/swiper-bundle.min.js"></script>
    <script src="assets/library/waypoints/noframework.waypoints.js"></script>
    <script src="assets/library/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            // Search
            $("#searchText").on("input", function(){
                console.log('test');
                var searchText = $(this).val();
                if(searchText === "") return;
                $.post('app/ajax/search.php',
                    {
                        key: searchText
                    },
                    function(data, status){
                        $("#chatList").html(data);
                    });
            });

            // Search using the button
            $("#serachBtn").on("click", function(){
                var searchText = $("#searchText").val();
                if(searchText === "") return;
                $.post('app/ajax/search.php',
                    {
                        key: searchText
                    },
                    function(data, status){
                        $("#chatList").html(data);
                    });
            });

        });
    </script>

    </body>

    </html>
<?php
} else {
    header("Location: connect.php");
    exit;
}
?>