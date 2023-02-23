<?php 
require_once(ROUTE_DIR."view/inc/menu.inc.html.php");
?>
<style>
h1{
        color: #fff;
        background-color: black;
    }
    .a{
        color: #fff;
        background-color: black;
        margin-top: 5%;
        margin-left: 25%;
        width: 20%;
        height: 5vh;
    }
</style>
<div class="a">
<a href="<?=WEB_ROUTE."?controller=articleConfectionController&view=add_article"?>" class="btn btn-primary mb-5 mt-5"><h1><center>Ajouter un article</center></h1></a>
</div>
<div class="row">
        <?php foreach($articleconfectionlist as $article): ?>
        <div class="col-3 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <img class="img-card" src="<?=WEB_ROUTE.'/images/uploads/'.$article['photoAC']?>" alt="">
                    <div class="row pt-5">
                        <h3 >Nom: <?=$article['libelleAC']?></h3>
                        <h4 >Prix: <?=$article['prixAC']?></h4>
                        <h4 >Quantite: <?=$article['quantiteAC']?></h4>
                        <h4 >Montant: <?=(int)$article['quantiteAC']*(int)$article['prixAC']?></h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                        <a href="<?=WEB_ROUTE.'?controller=articleConfectionController&view=edit&id='.$value['idAC']?>" 
                                class="modifier">Modifier</a>
                           
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn btn-danger rounded-circle" title="Supprimer">
                                <em class="fa fa-trash"></em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($i=1; $i <=$nbrPage  ; $i++): ?>
                <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controller=articleConfectionController&view=article_list&page='.$i?>">
                    <?= $i ?></a></li>
                <?php endfor;?>
            </ul>
        </nav>
    </div>
    </div>
    
</div>

<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>