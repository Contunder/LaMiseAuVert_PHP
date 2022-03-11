<?php

session_start();
# VERIFIER LE NOM D'UTILISATEUR, LE MOT DE PASSE ET LE NOM
if(isset($_POST['Nom']) &&
    isset($_SESSION['Id']) &&
    isset($_POST['Espece'])){

    # FICHIER DE CONNEXION À LA BASE DE DONNÉES
    include '../db_conn.php';
    include '../helpers/animal.php';

    # RECUPERER LA REQUETE POST
    $nom = $_POST['Nom'];
    $espece = $_POST['Espece'];

    # CREE UN FORMAT URL
    $data = 'nom='.$nom.'&espece='.$espece;

    # VALIDATION
    if (empty($nom)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Nom est requis";
        header("Location: ../../account.php?erreur=$em");
        exit;
    }else if(empty($espece)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Une espece est requise";
        header("Location: ../../account.php?erreur=$em&$data");
        exit;
    }else {
        # VERIFIER DANS LA BASE SI L'ESPECE EXISTE
        $sql = "CALL getEspece(?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$espece]);
        $especeId = $stmt->fetch();
        $stmt->closeCursor();

        # CREE UN NOUVELLE Animal
        $sql = "CALL addAnimal(?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $_SESSION['Id'], $especeId['Id']]);
        $stmt->closeCursor();

        # MESSAGE DE REUSSITE + REDIRECTION
        $sm = "Nouvelle animale ajouter";
        header("Location: ../../account.php?success=$sm");


    }

}else {
    $em = "Il manque des informations";
    header("Location: ../../account.php?erreur=$em");
    exit;
}