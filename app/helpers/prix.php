<?php

function getPrix($ville, $gardiennage, $conn) {

    $sql = "CALL getPrix(?, ?)";
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