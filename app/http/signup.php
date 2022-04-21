<?php  

# VERIFIER LE NOM D'UTILISATEUR, LE MOT DE PASSE ET LE NOM
if(isset($_POST['Adresse']) &&
   isset($_POST['Telephone']) &&
   isset($_POST['Email']) &&
   isset($_POST['Prenom']) &&
   isset($_POST['Password']) &&
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
   $password = $_POST['Password'];
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
   	  header("Location: ../../connect.php?erreur=$em");
   	  exit;
   }else if(empty($prenom)){
       # MESSAGE ERREUR + REDIRECTION
       $em = "Un Prénom est required";
       header("Location: ../../connect.php?erreur=$em&$data");
       exit;
   }else if(empty($adresse)){
      # MESSAGE ERREUR + REDIRECTION
   	  $em = "Une adresse est required";
   	  header("Location: ../../connect.php?erreur=$em&$data");
   	  exit;
   }else if(empty($telephone)){
       # MESSAGE ERREUR + REDIRECTION
       $em = "Un numéro de téléphone est required";
       header("Location: ../../connect.php?erreur=$em&$data");
       exit;
   }else if(empty($password)) {
       # MESSAGE ERREUR + REDIRECTION
       $em = "Password is required";
       header("Location: ../../connect.php?erreur=$em&$data");
       exit;
   }else if(empty($email)){
           # MESSAGE ERREUR + REDIRECTION
           $em = "Un Email est required";
           header("Location: ../../connect.php?erreur=$em&$data");
           exit;
   }else {
       # VERIFIER DANS LA BASE SI L'EMAIL EST UTILISER
       $sql = "CALL verifMail(?)";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$email]);

       if ($stmt->rowCount() > 0) {
           $em = "L'adresse Email : ($email) est déjà utilisé";
           header("Location: ../../connect.php?erreur=$em&$data");
           exit;
       }
       $stmt->closeCursor();

       // ON HASH LE MOT DE PASSE
       $password = hash('sha512', $password);

       # CREE UN NOUVELLE UTILISATEUR AVEC UNE IMAGE PAR DEFAUT
       $sql = "CALL addProprietaire(?,?,?,?,?)";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$nom, $prenom, $adresse, $telephone, $email]);

       $user = getUtilisateur($email, $conn);

       # CREE UN NOUVELLE UTILISATEUR AVEC UNE IMAGE PAR DEFAUT
       $sql = "CALL addUser(?,?,?)";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$user['Id'], $password, $role]);
       $stmt->closeCursor();

       $to      = $email;
       $subject = 'Verification de votre Email';
       $message = 'Pour verifier votre adresse Email <a href="172.29.106.49/app/http/verifMail.php?id='.$user['Id'].'">Cliquer ici</a>';
       $headers = array(
           'From' => 'no_reply@lamiseauvert.fr'
       );

       mail($to, $subject, $message, $headers);

       if (isset($_POST['Pension'])){
           # MESSAGE DE REUSSITE + REDIRECTION
           $sm = "Nouveau Compte Cree";
           header("Location: ../../account.php?success=$sm");
       }else {
           # MESSAGE DE REUSSITE + REDIRECTION
           $sm = "Nouveau Compte Cree";
           header("Location: ../../connect.php?success=$sm");
       }


   }

}else {
    $em = "Il manque des informations";
	header("Location: ../../connect.phperreur=$em");
   	exit;
}