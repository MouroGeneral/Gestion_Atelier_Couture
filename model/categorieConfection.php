<?php

function ajout_categorieconfection_db(array $categorieconfection) {
    $conn = get_connection();
    try {
        $sql = "INSERT INTO categorieconfection(libelleCC) VALUES(:libelleCC)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($categorieconfection);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function edit_categorieconfection_db(array $categorieconfection) {
    $conn = get_connection();
    try {
        $sql = "UPDATE categorieconfection SET libelleCC=:libelleCC WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute($categorieconfection);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function get_all_categorieconfection_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM categorieconfection";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de categorieconfection
    return $stmt->fetchAll();
}

function get_categorieconfection_by_id_bd(int $id) {
    $conn = get_connection();
    $sql = "SELECT * FROM categorieconfection WHERE id =:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $conn = null;
    return $stmt->fetch();
}
function get_categorieconfection_by_idCF_db(int $id)
{
    $conn = get_connection();
    try {
        $sql = "DELETE FROM categorieconfection WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return get_all_categorieconfection_db();
    } catch (\Throwable $th) {
        return false;
    }
}