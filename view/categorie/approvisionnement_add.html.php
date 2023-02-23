<?php 
require_once(ROUTE_DIR."view/inc/menu.inc.html.php");
?>

<div class="row">
<div class="col-md-12 col-sm-12">
<a href="<?=WEB_ROUTE."?controller=approvisionnementController&view=approvisionnement_list"?>" class="btn btn-primary mb-5 mt-5">Liste les approvisionnement</a>
        <div class="card">
            <div class="card-header text-center">
                Ajouter un approvisionnement
            </div>
            <div class="card-body">
                <form action="<?=WEB_ROUTE?>" method="post">
                <input type="hidden" name="controller" value="approvisionnementController">
                <?php if(!isset($approvisionnementEdit) || $approvisionnementEdit['idF'] == null): ?>
                    <input type="hidden" name="action" value="add">
                <?php endif; ?>
                <?php if(isset($approvisionnementEdit) && $approvisionnementEdit['idF'] != null): ?>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="idF" value="<?= $approvisionnementEdit['idF'] ?>">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="libelle" class="form-label">prix</label>
                                <input type="text" class="form-control" name="prix" idF="prix" value="<?= isset($approvisionnementEdit) ? $approvisionnementEdit['prix'] : '' ?>">
                                <span style="color: red;"></span>
                            </div>
                            <div class="mb-3">
                                <label for="libelle" class="form-label">montant</label>
                                <input type="text" class="form-control" name="montant" idF="montant" value="<?= isset($approvisionnementEdit) ? $approvisionnementEdit['montant'] : '' ?>">
                                <span style="color: red;"></span>
                            </div><div class="mb-3">
                                <label for="libelle" class="form-label">observation</label>
                                <input type="text" class="form-control" name="observation" idF="observation" value="<?= isset($approvisionnementEdit) ? $approvisionnementEdit['observation'] : '' ?>">
                                <span style="color: red;"></span>
                            </div><div class="mb-3">
                                <label for="libelle" class="form-label">quantite</label>
                                <input type="text" class="form-control" name="quantite" idF="quantite" value="<?= isset($approvisionnementEdit) ? $approvisionnementEdit['quantite'] : '' ?>">
                                <span style="color: red;"></span>
                            </div><div class="mb-3">
                               
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button class="btn btn-primary mt-4" type="submit">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>