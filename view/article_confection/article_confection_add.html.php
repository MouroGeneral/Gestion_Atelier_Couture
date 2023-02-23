<?php 
require_once(ROUTE_DIR."view/inc/menu.inc.html.php");
?>
<style>
    .submit{
        width: 90%;
        margin-top: 5%;
        margin-left: 20%;
    }
    input{
        width: 90%;
        height: 100%; 
        margin-left:4%;  
    }
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
    form{
        background-color: black;
    }
    section{
        margin-left: 25%;
        margin-top: 5%;
        width: 20%;
        background-color: black;
        padding:5px;
    }
    label{
       color: #fff;
       margin-left:4%;  
    }
</style>
<div class="a">
<a href="<?=WEB_ROUTE."?controller=articleConfectionController&view=article_list"?>" class="btn btn-primary mb-5 mt-5"><h1><center>Liste articles</center></h1></a>
</div>       
<div class="card">
            <div class="card-header text-center">
            <h2><center>Ajouter une article de confection</center></h2>
            </div>
            <section>
            <div class="card-body">
                <form action="<?=WEB_ROUTE?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="controller" value="articleConfectionController">
                <?php if(!isset($articleconfectionEdit) || $articleconfectionEdit['idAC'] == null): ?>
                    <input type="hidden" name="action" value="add">
                <?php endif; ?>
                    
                <?php if(isset($articleconfectionEdit) && $articleconfectionEdit['idAC'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idAC" value="<?= $articleconfectionEdit['idAC'] ?>">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="mb-3">
                                <label for="libelle" class="form-label">Libelle</label>
                                <input type="text" class="form-control" name="libelleAC" idAC="libelle" >
                                <span style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="mb-3">
                                <label for="prix" class="form-label">Prix</label>
                                <input type="text" class="form-control" name="prixAC" idAC="prix" >
                                <span style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="mb-3">
                                <label for="quantite" class="form-label">Quantite</label>
                                <input type="text" class="form-control" name="quantiteAC" AC="quantite" >
                                <span style="color: red;"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-12">
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input type="file" class="form-control" name="photoAC" idAC="photo" >
                                <span style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="mb-3">
                                <label for="article" class="form-label">article</label>
                                <select name="articleAC" idAC="article" class="form-control">
                                    <option value="0">Selectionnez une article</option>
                                    <?php foreach($articles as $article): ?>
                                    <option value="<?= $article['idAC'] ?>"><?= $article['libelleAC'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span style="color: red;"></span>
                            </div>
                        </div>
                        <div class="submit">
                            <button class="btn btn-primary mt-4" type="submit">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
            </section>
        </div>
    </div>
    
</div>

<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>