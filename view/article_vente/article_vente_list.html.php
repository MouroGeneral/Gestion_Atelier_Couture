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
<a href="<?=WEB_ROUTE."?controller=articleventeController&view=article_add"?>" class="btn btn-primary mb-5 mt-5"><h1><center>Ajouter un article</center></h1></a>
</div>
<div class="row">
        <?php foreach($articles as $articleventelist): ?>
        <div class="col-3 mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <img class="img-card" src="<?=WEB_ROUTE.'/images/uploads/'.$articleventelist['photoAV']?>" alt="">
                    <div class="row pt-5">
                        <h3 >Nom: <?=$articleventelist['libelleAV']?></h3>
                        <h4 >Prix: <?=$articleventelist['prixAV']?></h4>
                        <h4 >Quantite: <?=$articleventelist['quantiteAV']?></h4>
                        <h4 >Montant: <?=(int)$articleventelist['quantiteAV']*(int)$articleventelist['prixAV']?></h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-primary rounded-circle" title="Modifier">
                                <em class="fa fa-edit"></em>
                            </a>
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
                <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controller=articleventeController&view=article_list&page='.$i?>">
                    <?= $i ?></a></li>
                <?php endfor;?>
            </ul>
        </nav>
    </div>
    </div>
    
</div>

<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>