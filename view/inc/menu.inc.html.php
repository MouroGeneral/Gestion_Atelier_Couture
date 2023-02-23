<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MAMOUR GAYE</title>
   <link rel="stylesheet" href="<?= WEB_ROUTE.'/css/menu.css'?>" >
</head>
  <body >
<header >
        
    
   
                <div class="logo">
                        <h1>FILE ROUGE</h1>
                </div>
       
                <div class="nav_list">
                        <nav > 
                            <ul>
                                <li>
                                    <a href="<?=WEB_ROUTE."?controller=categorieController&view=categorie"?>" class="nav_link"> 
                                            Categorie de Confection 
                                        </a>
                                </li>
                            </ul>
                            
                            <ul>
                                <li>
                                    <a href="<?=WEB_ROUTE."?controller=articleConfectionController&view=add_article"?>" class="nav_link">
                                        Article de Confection 
                                    </a>
                                </li>
                            </ul>
                            
                            <ul>
                                <li>
                                    <a href="<?=WEB_ROUTE."?controller=fournisseurController&view=fournisseur_add"?>" class="nav_link">
                                        Fournisseur 
                                    </a>
                                </li>
                            </ul>

    
                            <ul>
                                <li>
                                    <a href="<?=WEB_ROUTE."?controller=approvisionnementController&view=approvisionnement"?>" class="nav_link">
                                        Approvisionnement 
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <a href="<?=WEB_ROUTE."?controller=categoriearticleventeController&view=categoriearticlevente_add"?>" class="nav_link"> 
                                            Categorie de Vente 
                                        </a>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <a href="<?=WEB_ROUTE."?controller=articleventeController&view=article_add"?>" class="nav_link">
                                        Article de Vente 
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <button>
                                        <a href="<?=WEB_ROUTE."?controller=securityController&view=deconnexion"?>" > 
                                    
                                        Se Déconnecter 
                                        </a>
                                    </button>
                                </li>
                            </ul>
                       
                        </nav>
                
                </div>
    
    </header>


 