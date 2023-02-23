<?php

 function ajout_articleconfection_db(array $articleconfection) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO articleconfection(libelleAC, prixAC, quantiteAC, montantAC, photoAC, idCC) VALUES(:libelleAC, :prixAC, :quantiteAC, :montantAC, :photoAC, :idCC)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($articleconfection);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function edit_articleconfection_db(array $articleconfection) {
    $conn = get_connection();
    try {
        $sql = "UPDATE articleconfection  WHERE idAC=:idAC";
        $stmt = $conn->prepare($sql);
        $stmt->execute($articleconfection);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
} 

function get_all_articleconfection_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM articleconfection";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

function get_articleconfection_by_id_bd(int $idAC) {
    $conn = get_connection();
    $sql = "SELECT * FROM articleconfection WHERE idAC =:idAC";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idAC' => $idAC]);
    $conn = null;
    return $stmt->fetch();
}