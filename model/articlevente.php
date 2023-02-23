<?php

 function ajout_articlevente_db(array $articlevente) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO articlevente(libelleAV, prixAV, quantiteAV, montantAV, photoAV, idCC) VALUES(:libelleAV, :prixAV, :quantiteAV, :montantAV, :photoAV, :idCC)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($articlevente);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function edit_articlevente_db(array $articlevente) {
    $conn = get_connection();
    try {
        $sql = "UPDATE articlevente SET libelleAV=:libelleAV WHERE idAV=:idAV";
        $stmt = $conn->prepare($sql);
        $stmt->execute($articlevente);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
} 

function get_all_articlevente_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM articlevente";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de articlevente
    return $stmt->fetchAll();
}

 function get_articlevente_by_id_bd(int $idAV) {
    $conn = get_connection();
    $sql = "SELECT * FROM articlevente WHERE idAV =:idAV";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idAV' => $idAV]);
    $conn = null;
    return $stmt->fetch();
} 