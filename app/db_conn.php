<?php 

    # NOM DU SERVEUR
    $sName = "127.0.0.1";
    # NOM D'UTILISATEUR
    $uName = "Valentin";
    # MOT DE PASSE
    $pass = "kilabilon";
    # NOM DE LA BASE
    $db_name = "lamiseauvert";

    #CONNECTION A LA BASE DE DONNÉES
    try {
        $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    # ERREUR DE CONNECTION
    catch(PDOException $e){
        echo "Connection erreur : ". $e->getMessage();
    }