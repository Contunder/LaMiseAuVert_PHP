<?php

function getPrix($ville, $gardiennage, $conn) {

    $sql = "SELECT * FROM Prix
        INNER JOIN Pension ON Prix.PensionId = Pension.Id
        INNER JOIN TypeGardiennage ON Prix.TypeGardiennageId = TypeGardiennage.Id
        WHERE Pension.Ville=? AND TypeGardiennage.Libelle = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ville, $gardiennage]);
    if ($stmt->rowCount() < 1) {
        return '';
    }
    if ($stmt->rowCount() > 0) {
        return $stmt->fetch();
    }
}

function getGardiennage($gardiennage, $conn) {

    $sql = "CALL getGardiennage(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$gardiennage]);
    if ($stmt->rowCount() < 1) {
        return '';
    }
    if ($stmt->rowCount() > 0) {
        return $stmt->fetch();
        $stmt->closeCursor();
    }
}

function getAllGardiennage($conn) {

    $sql = "CALL getAllGardiennage()";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() < 1) {
        return '';
    }
    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll();
        $stmt->closeCursor();
    }
}

?>