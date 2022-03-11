<?php
session_start();

# SI LE NOM D'UTILISATEUR & LE MOT DE PASSE SONT ENVOYER
if(isset($_POST['Ville']) &&
    isset($_POST['Description']) &&
    isset($_POST['Adresse']) &&
    isset($_POST['Responsable']) &&
    isset($_POST['Telephone'])){

    include '../db_conn.php';

    # RECUPERER LA REQUETE POST
    $ville = $_POST['Ville'];
    $description = $_POST['Description'];
    $adresse = $_POST['Adresse'];
    $responsable = $_POST['Responsable'];
    $telephone = $_POST['Telephone'];

    # VALIDATION
    if(empty($ville)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Une ville est requise";
        header("Location: ../../admin/edit/pension?pen=$ville&error=$em");
    }else if(empty($description)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Une description est requise";
        header("Location: ../../admin/edit/pension?pen=$ville&error=$em");
    } else if(empty($adresse)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Une adresse est requise";
        header("Location: ../../admin/edit/pension?pen=$ville&error=$em");
    } else if(empty($responsable)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un responsable est requis(e)";
        header("Location: ../../admin/edit/pension?pen=$ville&error=$em");
    } else if(empty($telephone)){
        # MESSAGE ERREUR + REDIRECTION
        $em = "Un numero de telephone est requis";
        header("Location: ../../admin/edit/pension?pen=$ville&error=$em");
    } else {
            # TELECHARGEMENT DE LA PHOTO DE PROFIL
            if (isset($_FILES['PP'])) {
                # RECUPERER LES INFORMATIONS
                $img_name  = $_FILES['PP']['name'];
                $tmp_name  = $_FILES['PP']['tmp_name'];
                $error  = $_FILES['PP']['error'];

                # SI IL N'Y A PAS D'ERREUR DE TELECHARGEMENT
                if($error === 0){

                    # OBTENIR L'EXTENSION DU FICHIER
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

                    # CONVETIR L'EXTENSION EN MINUSCULE
                    $img_ex_lc = strtolower($img_ex);

                    # VERIFIER LES L'EXTENTION ACCEPTER
                    $allowed_exs = array("jpg", "jpeg", "png");

                    #SI L'EXTENTTION EST VALIDE
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        # CRÉE LE NOUVEAUX NOM DE L'IMAGE AVEC LE NOM D'UTILSATEUR
                        $new_img_name = $ville. '_pension.'.$img_ex_lc;

                        # CHEMIN DE TELECHARGEMENT
                        $img_upload_path = '../../assets/uploads/pension/'.$new_img_name;

                        $img_bdd = 'assets/uploads/pension/'.$new_img_name;
                        # DEPLACER L'IMAGE VERS LE DOSSIER
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }else {
                        # MESSAGE ERREUR + REDIRECTION
                        $em = "Vous ne pouvez pas importer ce type de fichier";
                        header("Location: ../../admin/edit/pension?error=$em");
                        exit;
                    }

                }
            }

            # SI L'UTILISATEUR A UNE PHOTO DE PROFIL
            if (isset($new_img_name)) {

                # CREE UN NOUVELLE UTILISATEUR AVEC SON IMAGE
                $sql = "CALL updatePensionAndImage(?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$description, $adresse, $responsable, $telephone, $img_bdd, $ville]);
                $stmt->closeCursor();
            }else {
                # CREE UN NOUVELLE UTILISATEUR SANS L'IMAGE
                $sql = "CALL updatePension(?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$description, $adresse, $responsable, $telephone, $ville]);
                $stmt->closeCursor();
            }

            # MESSAGE DE REUSSITE + REDIRECTION
            $sm = "Nouveau Compte Crée";
            header("Location: ../../pension.php?pen=$ville&error=$sm");
            exit;
    }

}else {
    header("Location: ../../pension.php?pen=".$_POST['Ville']);
    exit;
}