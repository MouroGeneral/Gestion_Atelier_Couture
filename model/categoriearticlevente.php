<?php

function ajout_categoriearticlevente_db(array $categoriearticlevente) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO categoriearticlevente(libellecav) VALUES(:libellecav)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($categoriearticlevente);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function edit_categoriearticlevente_db(array $categoriearticlevente) {
    $conn = get_connection();
    try {
        $sql = "UPDATE categoriearticlevente SET libellecav=:libellecav WHERE idCAV=:idCAV";
        $stmt = $conn->prepare($sql);
        $stmt->execute($categoriearticlevente);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function get_all_categoriearticlevente_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM categoriearticlevente";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categoriearticlevente
    return $stmt->fetchAll();
}

function get_categoriearticlevente_by_idCAV_bd(int $idCAV) {
    $conn = get_connection();
    $sql = "SELECT * FROM categoriearticlevente WHERE idCAV =:idCAV";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idCAV' => $idCAV]);
    $conn = null;
    return $stmt->fetch();
}