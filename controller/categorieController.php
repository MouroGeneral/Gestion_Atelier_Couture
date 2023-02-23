<?php
// if(!is_admin()) header("Location:".WEB_ROUTE."?controller=affaireController&view=affaire");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "categorie") {
            require_once(ROUTE_DIR . 'view/categorie/categorie_add.html.php');
        } elseif ($_GET['view'] == "categorie_list") {
            $categorieconfectionlist = get_all_categorieconfection_db();
            require_once(ROUTE_DIR . 'view/categorie/categorie_list.html.php');
        } elseif ($_GET['view'] == "edit") {
            $id = (int) $_GET["id"];
            $categorieconfectionEdit = get_categorieconfection_by_id_bd($id);
            require_once(ROUTE_DIR . 'view/categorie/categorie_add.html.php');
        } elseif ($_GET['view'] == "delet") {
            $id = (int) $_GET["id"];
            $categorieconfectionDelet = get_categorieconfection_by_idCF_db($id);
            header("location:".WEB_ROUTE ."?controller=categorieController&view=categorie_list");
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if($_POST["action"] == "add") {
            ajout_categorieconfection($_POST);
        } elseif ($_POST["action"] == "edit") {
            edit_categorieconfection($_POST);
        }
    }
}



function ajout_categorieconfection($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "libelle", $libelleCC);

    if (empty($arrayError)) {
        $categorieconfection = [
            "libelleCC" => $libelleCC
        ];
        $result = ajout_categorieconfection_db($categorieconfection);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=categorieController&view=categorie_list");
}

function edit_categorieconfection($data) {
    $arrayError = array();
    extract($data);
    valide_libelle($arrayError, "libelle", $libelleCC);

    if (empty($arrayError)) {
        $categorieconfection = [
            "libelleCC" => $libelleCC,
            "id" => $id
        ];
        $result = edit_categorieconfection_db($categorieconfection);
        if($result) {
            $_SESSION["success_operation"] = SUCCESS_MSG;
        } else {
            $_SESSION["error_operation"] = FAILED_MSG;
        }
    } else {
        
        $_SESSION["arrayError"] = $arrayError;
    }
    header("Location:".WEB_ROUTE."?controller=categorieController&view=categorie_list");
}