<?php  

# RECUPERER LES DONNÉES D'UN UTILISATEURS
function getUtilisateur($email, $conn){
   $sql = "CALL getUtilisateur(?)";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$email]);

   if ($stmt->rowCount() === 1) {
   	    $utilisateur = $stmt->fetch();
        $stmt->closeCursor();
   	    return $utilisateur;
   }else {
   	    $utilisateur = [];
   	    return $utilisateur;
   }
}

function getRole($userId, $conn){
    $sql = "CALL getRole(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userId]);

    if ($stmt->rowCount() === 1) {
        $role = $stmt->fetch();
        $stmt->closeCursor();
        return $role;
    }else {
        $role = [];
        return $role;
    }
}

function getCopropiete($conn){
    $sql = "CALL selectcopropriete()";
    $stmt =  $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 1) {
        $copropriete = $stmt->fetchAll();
        $stmt->closeCursor();
        return $copropriete;
    }else {
        $copropriete = [];
        return $coproprieter;
    }
}



