<?php
session_start();

# SI LE NOM D'UTILISATEUR & LE MOT DE PASSE SONT ENVOYER
if(isset($_POST['Ville']) &&
    isset($_POST['Pension']) &&
    isset($_POST['Camping']) &&
    isset($_POST['Hotel'])){

    include '../db_conn.php';
    include '../helpers/pension.php';
    include '../helpers/prix.php';

    # RECUPERER LA REQUETE POST
    $ville = $_POST['Ville'];
    $tarifs = array(0 => $_POST['Hotel'], 1 => $_POST['Camping'], 2 => $_POST['Pension']);

    # VALIDATION
    if(empty($ville)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Une ville est requise";
        header("Location: ../../admin/edit/prix.php?pen=$ville&error=$em");
    }else if(empty($tarifs[1])){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un prix est requis";
        header("Location: ../../admin/edit/prix.php?pen=$ville&error=$em");
    } else {

        $pension = getPension($ville, $conn);

        $typeGardiennage = getAllGardiennage($conn);

        $i=0;
        while ($i < 3){
            # CREE UN NOUVELLE UTILISATEUR SANS L'IMAGE
            $sql = "CALL updatePrix(?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$tarifs[$i], $pension['Id'], $typeGardiennage[$i]['Id']]);
            $stmt->closeCursor();
            $i++;
        }


        # MESSAGE DE REUSSITE + REDIRECTION
        $sm = "Prix modifier";
        header("Location: ../../prix.php?pen=$ville&error=$sm");
        exit;
    }

}else {
    header("Location: ../../prix.php?pen=".$_POST['Ville']);
    exit;
}