<?php

function ajout_approvisionnement_db(array $approvisionnement) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO approvisionnement(nom) VALUES(:nom)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($approvisionnement);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function edit_approvisionnement_db(array $approvisionnement) {
    $conn = get_connection();
    try {
        $sql = "UPDATE approvisionnement SET nom=:nom WHERE idAPP=:idAPP";
        $stmt = $conn->prepare($sql);
        $stmt->execute($approvisionnement);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function get_all_approvisionnement_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM approvisionnement";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

function get_approvisionnement_by_id_bd(int $idAPP) {
    $conn = get_connection();
    $sql = "SELECT * FROM approvisionnement WHERE idAPP =:idAPP";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idAPP' => $idAPP]);
    $conn = null;
    return $stmt->fetch();
}