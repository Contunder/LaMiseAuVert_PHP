<?php

# VERIFIER LE NOM D'UTILISATEUR, LE MOT DE PASSE ET LE NOM
if(isset($_POST['Adresse']) &&
    isset($_POST['Telephone']) &&
    isset($_POST['Email']) &&
    isset($_POST['Prenom']) &&
    isset($_POST['Nom'])){

    # FICHIER DE CONNEXION À LA BASE DE DONNÉES
    include '../db_conn.php';
    include '../helpers/user.php';

    # RECUPERER LA REQUETE POST
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $adresse = $_POST['Adresse'];
    $telephone = $_POST['Telephone'];
    $email = $_POST['Email'];
    $id = $_POST['UserId'];

    # CREE UN FORMAT URL
    $data = 'nom='.$nom.'&prenom='.$prenom;

    # VALIDATION
    if (empty($nom)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Nom est requis";
        header("Location: ../../account.php?erreur=$em");
        exit;
    }else if(empty($prenom)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Prénom est requis";
        header("Location: ../../account.php?erreur=$em&$data");
        exit;
    }else if(empty($adresse)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Une adresse est requis";
        header("Location: ../../account.php?erreur=$em&$data");
        exit;
    }else if(empty($telephone)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un numéro de téléphone est requis";
        header("Location: ../../account.php?erreur=$em&$data");
        exit;
    }else if(empty($email)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Email est requis";
        header("Location: ../../account.php?erreur=$em&$data");
        exit;
    }else {

        # CREE UN NOUVELLE UTILISATEUR AVEC UNE IMAGE PAR DEFAUT
        $sql = "CALL updateProprietaire(?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $adresse, $telephone, $email, $id]);
        $stmt->closeCursor();

        # MESSAGE DE REUSSITE + REDIRECTION
        $sm = "Compte modifier";
        header("Location: ../../account.php?success=$sm");


    }

}else {
    $em = "Il manque des informations";
    header("Location: ../../account.php?erreur=$em");
    exit;
}