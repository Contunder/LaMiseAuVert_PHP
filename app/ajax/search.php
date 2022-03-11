<?php

session_start();

# VERRIFIER SI L'UTILISATEUR EST CONNECTER
if (isset($_SESSION['Email'])) {
    # VERIFIER SI UNE CLÉ À ÉTAIT ENVOYER
    if(isset($_POST['key'])){
       # FICHIER DE CONNEXION À LA BASE DE DONNÉES
	   include '../db_conn.php';

       # CREE UN ALGORITHME DE RECHERCHE
	   $key = "%{$_POST['key']}%";
     
	   $sql = "CALL getSearch(?)";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$key]);

       if($stmt->rowCount() > 0){ 
         $utilisateur = $stmt->fetchAll();
         $stmt->closeCursor();

         foreach ($utilisateur as $utilisateur) {
         	if ($utilisateur['Id'] == $_SESSION['Id']) continue;
       ?>
       <li class="list-group-item">
			<div class="d-flex align-items-center">
                <ul>
                    <b><u>Utilisateur</u></b>
                    <li><?=$utilisateur['Nom']?> <?=$utilisateur['Prenom']?></li>
                    <li><?=$utilisateur['Adresse']?></li>
                    <li><?=$utilisateur['Telephone']?></li>
                    <li><?=$utilisateur['Email']?></li>
                </ul>
                <?php if (isset($utilisateur['NomAnimal']) && isset($utilisateur['Libelle'])) {
                    if ($utilisateur['ProprietaireId'] == $utilisateur['Id']) {?>
                <ul>
                    <b><u>Animal</u></b>
                    <li><?= $utilisateur['NomAnimal']?></li>
                    <li><?= $utilisateur['Libelle']?></li>
                </ul>
                <?php } } ?>
			</div>
	   </li>
       <?php } }else { ?>
         <div class="alert alert-info text-center">
		   <i class="fa fa-user-times d-block fs-big"></i>
           L'utilisateur "<?=htmlspecialchars($_POST['key'])?>" n'est pas trouvé.
		</div>
    <?php }
    }

}else {
	header("Location: ../../account.php");
	exit;
}