<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "article_add") {
         
            $articles = get_all_articlevente_db();
            require_once(ROUTE_DIR . 'view/article_vente/article_vente_add.html.php');
        } elseif ($_GET['view'] == "article_list") {
            $page = 1;
            if (isset($_GET['page'])) {
                $page = (int)$_GET['page'];
            }
            $totalList = get_all_articlevente_db();
            $articleventelist = get_list_per_page($totalList,$page, 5);
            $nbrPage = get_nbrpage($totalList, 5);
            $articles = get_all_articlevente_db();
          
            require_once(ROUTE_DIR . 'view/article_vente/article_vente_list.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if (isset($_POST['action'])) {
        if($_POST["action"] == "add") {
           
            ajout_articlevente($_POST, $_FILES);
        } elseif ($_POST["action"] == "edit") {
            edit_articlevente($_POST);
        }
    }
}



function ajout_articlevente($data, $files) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "libelleAC", $libelleAC);

    if (empty($arrayError)) {
        
        $articlevente = [
            "libelleAC" => $libelleAC,
            "prixAC" => (int)$prixAC,
            "quantiteAC" => (int)$quantiteAC,
            "montantAC" => (int)$prixAC * (int)$quantiteAC,
            "idCC" => (int)$articleAC,
            "photoAC" => $files['photoAC']['name'],
        ];
        to_uploads($files, "photoAC");
        $result = ajout_articlevente_db($articlevente);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=articleventeController&view=article_list");
}

function edit_articlevente($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "libelle", $libelleAV);

    if (empty($arrayError)) {
        $articlevente = [
            "libelleAV" => $libelleAV,
            "idAV" => $idAV
        ];
        $result = edit_articlevente_db($articlevente);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=articleController&view=article_list");
}