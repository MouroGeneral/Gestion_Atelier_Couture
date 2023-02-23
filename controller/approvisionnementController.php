<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "approvisionnement") {
            require_once(ROUTE_DIR . 'view/categorie/approvisionnement_add.html.php');
        } elseif ($_GET['view'] == "approvisionnement_list") {
            $approvisionnementlist = get_all_approvisionnement_db();
            require_once(ROUTE_DIR . 'view/categorie/approvisionnement_list.html.php');
        } elseif ($_GET['view'] == "edit") {
            $idF = (int) $_GET["idF"];
            $approvisionnementEdit = get_approvisionnement_by_id_bd($idF);
            require_once(ROUTE_DIR . 'view/categorie/approvisionnement_add.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if($_POST["action"] == "add") {
            ajout_approvisionnement($_POST);
        } elseif ($_POST["action"] == "edit") {
            edit_approvisionnement($_POST);
        }
    }
}



function ajout_approvisionnement($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "nom", $nom);

    if (empty($arrayError)) {
        $approvisionnement = [
            "nom" => $nom
        ];
        $result = ajout_approvisionnement_db($approvisionnement);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=approvisionnementController&view=approvisionnement_list");
}

function edit_approvisionnement($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "nom", $nom);

    if (empty($arrayError)) {
        $approvisionnement = [
            "nom" => $nom,
            "idF" => $idF
        ];
        $result = edit_approvisionnement_db($approvisionnement);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=approvisionnementController&view=approvisionnement_list");
}