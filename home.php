<?php 
  session_start();

  if (isset($_SESSION['Email'])) {
  	# database connection file
  	include 'app/db_conn.php';

  	include 'app/helpers/user.php';

  	# Getting User data data
  	$utilisateur = getUtilisateur($_SESSION['Email'], $conn);


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Mise Au Vert - Home</title>
        <link href="assets/library/bootstrap/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="icon" href="assets/img/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-2 w-400 rounded shadow">
            <div>
                <div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h3 class="fs-xs m-2"><?=$utilisateur['Nom']?> <?=$utilisateur['Prenom']?></h3>
                    </div>
                    <a href="logout.php" class="btn btn-dark">Déconnection</a>
                </div>

                <ul id="chatList" class="list-group mvh-50 overflow-auto">
                    <li class="list-group-item">
                        <a href="animal.php" class="d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center">
                                <img src="assets/img/wouf.jpeg" class="w-10 rounded-circle">
                                <h3 class="fs-xs m-2">
                                    Mon Animal<br>
                                    <small>

                                    </small>
                                </h3>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="pension.php" class="d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center">
                                <img src="assets/img/pension.jpg" class="w-10 rounded-circle">
                                <h3 class="fs-xs m-2">
                                    Ma Pension<br>
                                    <small>

                                    </small>
                                </h3>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </body>
</html>
<?php
  }else{
  	header("Location: login.php");
   	exit;
  }
 ?>