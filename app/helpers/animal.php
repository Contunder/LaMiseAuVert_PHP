<?php

function getAllCatEspece($conn) {

    $sql = "CALL getAllCatEspece()";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() < 1) {
        return '';
    }
    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll();
    }

}

function getAllDogEspece($conn) {

    $sql = "CALL getAllDogEspece()";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() < 1) {
        return '';
    }
    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll();
    }

}

function getMyAnimal($proprietaireId, $conn) {

    $sql = "CALL getMyAnimal(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$proprietaireId]);
    if ($stmt->rowCount() < 1) {
        return '';
    }
    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll();
        $stmt->closeCursor();
    }

}

function getMyEspece($especeId, $conn) {

    $sql = "CALL getMyEspece(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$especeId]);
    if ($stmt->rowCount() < 1) {
        return '';
    }
    if ($stmt->rowCount() > 0) {
        return $stmt->fetch();
        $stmt->closeCursor();
    }

}

?>
