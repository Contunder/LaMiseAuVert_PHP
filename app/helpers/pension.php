<?php

function getPension($ville, $conn) {

    $sql = "CALL getPension(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ville]);
    if ($stmt->rowCount() < 1) {
        return '';
    }
    if ($stmt->rowCount() > 0) {
        return $stmt->fetch();
        $stmt->closeCursor();
    }

}

function getAllPension($conn) {

    $sql = "CALL getAllPension()";
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