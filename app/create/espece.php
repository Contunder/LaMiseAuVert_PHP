<?php
session_start();

# SI LE NOM D'UTILISATEUR & LE MOT DE PASSE SONT ENVOYER
if(isset($_POST['Animal']) &&
    isset($_POST['Espece'])){

    include '../db_conn.php';

    # RECUPERER LA REQUETE POST
    $animal = $_POST['Animal'];
    $espesce = $_POST['Espece'];

    # VALIDATION
    if(empty($animal)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un animal est requis";
        header("Location: ../../account.php?error=$em");
    }else if(empty($espesce)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Une espece requise";
        header("Location: ../../account.php?error=$em");
    } else {

        # CREE UN NOUVELLE UTILISATEUR SANS L'IMAGE
        $sql = "CALL addEspece(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$animal, $espesce]);
        $stmt->closeCursor();


        # MESSAGE DE REUSSITE + REDIRECTION
        $sm = "Nouvelle Espece Cree";
        header("Location: ../../account.php?error=$sm");
        exit;
    }

}else {
    header("Location: ../../account.php");
    exit;
}