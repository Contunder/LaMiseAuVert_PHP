<?php

# VERIFIER LE NOM D'UTILISATEUR, LE MOT DE PASSE ET LE NOM
if (isset($_GET['id'])) {

    # FICHIER DE CONNEXION À LA BASE DE DONNÉES
    include '../db_conn.php';

    # RECUPERER LA REQUETE POST
    $animalId = $_GET['id'];


    # VALIDATION
    if (empty($animalId)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Il manque des informations";
        header("Location: ../../account.php?erreur=$em");
        exit;
    } else {
        # VERIFIER DANS LA BASE SI L'ESPECE EXISTE
        $sql = "CALL deleteAnimal(?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$animalId]);
        $stmt->closeCursor();

        # MESSAGE DE REUSSITE + REDIRECTION
        $sm = "Animale supprimer";
        header("Location: ../../account.php?success=$sm");

    }

} else {
    $em = "Il manque des informations";
    header("Location: ../../account.php?erreur=$em");
    exit;
}
