<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "add_article") {
            $articleconfectionlist =get_all_articleconfection_db();
            require_once(ROUTE_DIR . 'view/article_confection/article_confection_add.html.php');
        } elseif ($_GET['view'] == "article_list") {
            $page = 1;
            if (isset($_GET['page'])) {
                $page = (int)$_GET['page'];
            }
            $totalList = get_all_articleconfection_db();
            $articleconfectionlist = get_list_per_page($totalList,$page, 5);
            $nbrPage = get_nbrpage($totalList, 5);
            require_once(ROUTE_DIR . 'view/article_confection/article_confection_list.html.php');

        } elseif ($_GET['view'] == "edit") {
            $idAC = (int) $_GET["idAC"];
                $articleconfectionEdit = get_articleconfection_by_id_bd($idAC);
            require_once(ROUTE_DIR . 'view/article_confection/article_confection_add.html.php');

            }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if($_POST["action"] == "add") {
            ajout_articleconfection($_POST, $_FILES);
        } elseif ($_POST["action"] == "edit") {
            edit_articleconfection($_POST);
        }
    }
}



function ajout_articleconfection($data, $files) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "libelleAC", $libelleAC);

    if (empty($arrayError)) {
        $articleconfection = [
            "libelleAC" => $libelleAC,
            "prixAC" => (int)$prixAC,
            "quantiteAC" => (int)$quantiteAC,
            "montantAC" => (int)$prixAC * (int)$quantiteAC,
            "idCC" => (int)$categorieAC,
            "photoAC" => $files['photoAC']['name'],
        ];
        to_uploads($files, "photoAC");
        $result = ajout_articleconfection_db($articleconfection);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=articleConfectionController&view=article_list");
}

function edit_articleconfection($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "idAC", $idAC);

    if (empty($arrayError)) {
        $articleconfection = [
            "libelleAC" => $libelleAC,
            "idAC" => $idAC
        ];
        $result = edit_articleconfection_db($articleconfection);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=articleConfectionController&view=article_list");
}