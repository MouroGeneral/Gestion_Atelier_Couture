<?php

function desactiverfournisseur($idF){
    try{
        $req = "UPDATE fournisseur  where idF='$idF'";
        return get_connection()->exec($req);
    }catch(PDOException $error){
        die("Impossible de supprimer fournisseur " .$idF.''. $error->getMessage());
    }
}

function Ajout_fournisseur_db(array $fournisseur) {

    $conn = get_connection();
    try {
  $sql = "INSERT INTO fournisseur ( nom, prenom, telephone, adresse, photoF) VALUES (:nom, :prenom, :telephone, :adresse, :photoF)";
    $stmt = $conn->prepare($sql );
    $stmt->bindParam(":sql",$sql);
    $stmt->bindParam(":nom",$nom);
    $stmt->bindParam(":prenom",$prenom);
    $stmt->bindParam(":telephone",$telephone);
    $stmt->bindParam(":adresse",$adresse);
    $stmt->bindParam(":photoF",$photoF);
    $stmt->execute($fournisseur);
    $stmt->execute($fournisseur);

    return true;
     
    

    } catch (\Throwable $th) {
        return false;
     }

}

function get_fournisseurcontroller_by_id_db(int $idF) {
    $conn = get_connection();
    $sql = "SELECT * FROM fournisseur WHERE idF =:idF";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idF' => $idF]);
    $conn = null;
    return $stmt->fetch();
}
function edit_fournisseur_db( array $fournisseur) {
    $conn = get_connection();
    try {
       /// var_dump($fournisseur);die;
        $sql = "UPDATE fournisseur SET nom=:nom,prenom=:prenom,telephone=:telephone,adresse=:adresse,photoF=:photoF WHERE idF=:idF";
        $stmt = $conn->prepare($sql);
        $stmt->execute($fournisseur);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}


function get_all_fournisseur_db() {
    // connection a la base de donnees
    $conn = get_connection();
    // requete sql
    $sql = "SELECT * FROM fournisseur";
    // execution de la requete sql
    $stmt = $conn->query($sql);
    // ferme la connection a la base de donnees
    $conn = null;
    // retourne le tableau de fournisseur
    return $stmt->fetchAll();
}

function get_fournisseur_by_id_bd(int $idF) {
    $conn = get_connection();
    $sql = "SELECT * FROM fournisseur WHERE idF =:idF";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idF' => $idF]);
    $conn = null;
    return $stmt->fetch();
}
function get_fournisseur_by_idCF_db(int $idF) {
    $conn = get_connection();
    try {
        $sql = "DELETE FROM fournisseur WHERE idF=:idF";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':idF' => $idF]);
        return get_all_fournisseur_db();
    } catch (\Throwable $th) {
        return false;
    }
}
function filtre_by_prenom($prenom): array
{
    $conn = get_connection();
    $stmt =$conn->prepare("SELECT * FROM fournisseur WHERE prenom=?");
    $stmt->execute(array($prenom));
    return $stmt->fetchAll();
}