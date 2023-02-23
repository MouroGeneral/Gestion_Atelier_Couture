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
<a  href="<?=WEB_ROUTE."?controller=categorieController&view=categorie_list"?>" class="btn btn-primary mb-5 mt-5"><h1><center>Liste categories</center></h1></a>
</div>
<div class="b">
<h2><center> Ajouter une categorie de confection</center></h2>
</div>
<section>
<div class="row">
    <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                    </div>
                    <div class="card-body">
                        <form action="<?=WEB_ROUTE?>" method="post">
                                <input type="hidden" name="controller" value="categorieController">
                                <?php if(!isset($categorieconfectionEdit) || $categorieconfectionEdit['id'] == null): ?>
                                    <input type="hidden" name="action" value="add">
                                <?php endif; ?>
                                <?php if(isset($categorieconfectionEdit) && $categorieconfectionEdit['id'] != null): ?>
                                    <input type="hidden" name="action" value="edit">
                                    <input type="hidden" name="id" value="<?= $categorieconfectionEdit['id'] ?>">
                                <?php endif; ?>
                                <div class="row">
                                    <div class="row1">
                                        <div class="row2">
                                            <label for="libelle" class="form-label">Categorie</label>
                                            <input type="text" class="form-control" name="libelleCC" id="libelle" value="<?= isset($categorieconfectionEdit) ? $categorieconfectionEdit['libelleCC'] : '' ?>">
                                            <span style="color: red;"></span>
                                        </div>
                                    </div>
                                    <div class="submit">
                                            <button class="btn btn-primary mt-4" type="submit">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
        </div>
    
</div>
</section>
<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>