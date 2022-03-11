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
    if (isset($_POST['Pension'])){
        $role = $_POST['Pension'];
    }else {
        $role = 'USER';
    }

    # CREE UN FORMAT URL
    $data = 'nom='.$nom.'&prenom='.$prenom;

    # VALIDATION
    if (empty($nom)) {
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Nom est required";
        header("Location: ../../account.php?erreur=$em");
        exit;
    }else if(empty($prenom)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Prénom est required";
        header("Location: ../../account.php?erreur=$em&$data");
        exit;
    }else if(empty($adresse)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Une adresse est required";
        header("Location: ../../account.php?erreur=$em&$data");
        exit;
    }else if(empty($telephone)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un numéro de téléphone est required";
        header("Location: ../../account.php?erreur=$em&$data");
        exit;
    }else if(empty($email)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un Email est required";
        header("Location: ../../account.php?erreur=$em&$data");
        exit;
    }else {

        # CREE UN NOUVELLE UTILISATEUR AVEC UNE IMAGE PAR DEFAUT
        $sql = "CALL updateProprietaire(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $adresse, $telephone, $email]);
        $stmt->closeCursor();

        $user = getUtilisateur($email, $conn);

        # CREE UN NOUVELLE UTILISATEUR AVEC UNE IMAGE PAR DEFAUT
        $sql = "CALL updateUser(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user['Id'], $role]);
        $stmt->closeCursor();

        if (isset($_POST['Pension'])){
            # MESSAGE DE REUSSITE + REDIRECTION
            $sm = "Compte modifier";
            header("Location: ../../account_pen.php?success=$sm");
        }else {
            # MESSAGE DE REUSSITE + REDIRECTION
            $sm = "Compte modifier";
            header("Location: ../../account.php?success=$sm");
        }


    }

}else {
    $em = "Il manque des informations";
    header("Location: ../../account.php?erreur=$em");
    exit;
}