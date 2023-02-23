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
<a href="<?=WEB_ROUTE."?controller=fournisseurController&view=fournisseur_list"?>" class="btn btn-primary mb-5 mt-5"><h1><center>lister fournisseur</center></h1></a>
</div>
<div class="card">
            <div class="card-header text-center">
               <h2><center>Ajoute Fournisseur</center></h2>
            </div>
            <section>
            <div class="card-body">
                <form action="<?=WEB_ROUTE?>" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="controller" value="fournisseurController">
                <?php if(!isset($fournisseurEdit) || $fournisseurEdit['idF'] == null): ?>
                    <input type="hidden" name="action" value="add">
                <?php endif; ?>
                
                <?php if(isset($fournisseurEdit) && $fournisseurEdit['idF'] = null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?= $fournisseurEdit['idF'] ?>">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                     
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" idF="nom" value="<?= isset($fournisseurEdit) ? $fournisseurEdit['nom'] : '' ?>">
                                <span style="color: red;"></span>
                            </div>
                            <div class="mb-3">
                                <label for="Prenom" class="form-label">Prenom</label>
                                <input type="text" class="form-control" name="prenom" idF="prenom" value="<?= isset($fournisseurEdit) ? $fournisseurEdit['prenom'] : '' ?>">
                                <span style="color: red;"></span>
                            </div>
                           
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Telephone</label>
                                <input type="text" class="form-control" name="telephone" idF="telephone" value="<?= isset($fournisseurEdit) ? $fournisseurEdit['telephone'] : '' ?>">
                                <span style="color: red;"></span>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Adresse</label>
                                <input type="text" class="form-control" name="adresse" idF="adresse" value="<?= isset($fournisseurEdit) ? $fournisseurEdit['adresse'] : '' ?>">
                                <span style="color: red;"></span>
                            </div>
                            
                            <div class="form-group">
                    <label class="form-label" for="">Choisir une image</label>
                    <input type="file" name="photoF" class="form-input">
                    <span><?=isset($arrayError) && isset($arrayError["photoF"]) ? $arrayError["photoF"] : '';?></span>
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