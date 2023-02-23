<?php
if (isset($_REQUEST['controller'])) {
    if($_REQUEST['controller'] == "categorieController") {
        require_once(ROUTE_DIR.'controller/categorieController.php');
    }
    elseif($_REQUEST['controller'] == "articleConfectionController") {
        
        require_once(ROUTE_DIR.'controller/articleConfectionController.php');
    } 
    
    elseif($_REQUEST['controller'] == "fournisseurController") {
        require_once(ROUTE_DIR.'controller/fournisseurController.php');
    } 
    elseif($_REQUEST['controller'] == "approvisionnementController") {
        require_once(ROUTE_DIR.'controller/approvisionnementController.php');
    } 
    elseif($_REQUEST['controller'] == "categoriearticleventeController") {
        
        require_once(ROUTE_DIR.'controller/categoriearticleventeController.php');
    } 
    elseif($_REQUEST['controller'] == "articleventeController") {
        
        require_once(ROUTE_DIR.'controller/articleventeController.php');
    } 
}  