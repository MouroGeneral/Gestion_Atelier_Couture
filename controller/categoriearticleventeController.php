<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "categoriearticlevente_add") {
            require_once(ROUTE_DIR . 'view/categorie_vente/categoriearticlevente_add.html.php');
        } elseif ($_GET['view'] == "categoriearticlevente_list") {
            $categoriearticleventelist = get_all_categoriearticlevente_db();
            require_once(ROUTE_DIR . 'view/categorie_vente/categoriearticlevente_list.html.php');
        } elseif ($_GET['view'] == "edit") {
            $idCAV = (int) $_GET["idCAV"];
            $categoriearticleventeEdit = get_categoriearticlevente_by_idCAV_bd($idCAV);
            require_once(ROUTE_DIR . 'view/categorie_vente/categoriearticlevente_add.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if($_POST["action"] == "add") {
            ajout_categoriearticlevente($_POST);
        } elseif ($_POST["action"] == "edit") {
            edit_categoriearticlevente($_POST);
        }
    }
}



function ajout_categoriearticlevente($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "libellecav", $libellecav);

    if (empty($arrayError)) {
        $categoriearticlevente = [
            "libellecav" => $libellecav
        ];
        $result = ajout_categoriearticlevente_db($categoriearticlevente);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=categoriearticleventeController&view=categoriearticlevente_list");
}

function edit_categoriearticlevente($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "libellecav", $libellecav);

    if (empty($arrayError)) {
        $categoriearticlevente = [
            "libellecav" => $libellecav,
            "idCAV" => $idCAV
        ];
        $result = edit_categoriearticlevente_db($categoriearticlevente);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=categoriearticleventeController&view=categoriearticlevente_list");
}