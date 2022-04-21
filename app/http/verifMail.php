<?php

# VERIFIER LE NOM D'UTILISATEUR, LE MOT DE PASSE ET LE NOM
if (isset($_GET['id'])) {

    # FICHIER DE CONNEXION À LA BASE DE DONNÉES
    include '../db_conn.php';

    # RECUPERER LA REQUETE POST
    $proprietaireId = $_GET['id'];


    # VALIDATION
    if (empty($proprietaireId)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Il manque des informations";
        header("Location: ../../account.php?erreur=$em");
        exit;
    } else {
        # VERIFIER DANS LA BASE SI L'ESPECE EXISTE
        $sql = "CALL verifEmail(?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$proprietaireId]);
        $stmt->closeCursor();

        # MESSAGE DE REUSSITE + REDIRECTION
        $sm = "Email verifier";
        header("Location: ../../account.php?success=$sm");

    }

} else {
    $em = "Il manque des informations";
    header("Location: ../../account.php?erreur=$em");
    exit;
}
