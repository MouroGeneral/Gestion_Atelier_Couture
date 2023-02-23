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
<a href="<?=WEB_ROUTE."?controller=categoriearticleventeController&view=categoriearticlevente_list"?>" class="btn btn-primary mb-5 mt-5"><h1><center>Liste categories de ventes</center></h1></a>
</div>
<div class="card">
            <div class="card-header text-center">
                <h2><center>Ajouter une categorie de vente </center></h2> 
            </div>
            <section>
            <div class="card-body">
                <form action="<?=WEB_ROUTE?>" method="post">
                <input type="hidden" name="controller" value="categoriearticleventeController">
                <?php if(!isset($categoriearticleventeEdit) || $categoriearticleventeEdit['idCAV'] == null): ?>
                    <input type="hidden" name="action" value="add">
                <?php endif; ?>
                <?php if(isset($categoriearticleventeEdit) && $categoriearticleventeEdit['idCAV'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idCAV" value="<?= $categoriearticleventeEdit['idCAV'] ?>">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="libelle" class="form-label">categorie de vente</label>
                                <input type="text" class="form-control" name="libellecav" idCAV="libelle" value="<?= isset($categoriearticleventeEdit) ? $categoriearticleventeEdit['libelleCC'] : '' ?>">
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
   

<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>