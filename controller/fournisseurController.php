<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "fournisseur_add") {
            require_once(ROUTE_DIR . 'view/fournisseur/fournisseur_add.html.php');
        } elseif ($_GET['view'] == "fournisseur_list") {
            $fournisseurlist = get_all_fournisseur_db();
            require_once(ROUTE_DIR . 'view/fournisseur/fournisseur_list.html.php');
        } elseif ($_GET['view'] == "edit") {
            $idF = (int) $_GET["idF"];
            $fournisseurEdit = get_fournisseur_by_id_bd($idF);
            require_once(ROUTE_DIR . 'view/fournisseur/fournisseur_add.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
       
        if($_POST["action"] == "add") {
            ajout_fournisseur($_POST,$_FILES);
           
        } elseif ($_POST["action"] == "edit") {
            edit_fournisseur($_POST);
        }
    }
}



function ajout_fournisseur($data,$files) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "nom", $nom);
    valide_libelle($arrayError, "prenom", $prenom);
    valide_libelle($arrayError, "telephone", $telephone);
    valide_libelle($arrayError, "adresse", $adresse);
   

    if (empty($arrayError)) {
        to_uploads($files,'photoF');
        $fournisseur = [
            "nom" => $nom,
            "prenom" => $prenom,
            "telephone" => $telephone,
            "adresse" => $adresse,
            "photoF" => $files["photoF"]["name"],
        ];
        $result = ajout_fournisseur_db($fournisseur);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=fournisseurController&view=fournisseur_list");
}

function edit_fournisseur($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "nom", $nom);
    valide_libelle($arrayError, "prenom", $prenom);
    valide_libelle($arrayError, "telephone", $telephone);
    valide_libelle($arrayError, "adresse", $adresse);
    valide_libelle($arrayError, "photoF", $photoF);
;

    if (empty($arrayError)) {
        $fournisseur = [
            "nom" => $nom,
            "prenom" => $prenom,
            "telephone" => $telephone,
            "adresse" => $adresse,
            "photoF" => $photoF,
            "idF" => $idF
        ];
        $result = edit_fournisseur_db($fournisseur);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=fournisseurController&view=fournisseur_list");
}