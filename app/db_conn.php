<?php 

    # NOM DU SERVEUR
    $sName = "localhost";
    # NOM D'UTILISATEUR
    $uName = "prof1234";
    # MOT DE PASSE
    $pass = "prof_1234!";
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