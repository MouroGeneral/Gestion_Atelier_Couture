<?php 
require_once(ROUTE_DIR."view/inc/menu.inc.html.php");
?>

<div class="row">
<div class="col-md-12 col-sm-12">
<a href="<?=WEB_ROUTE."?controller=approvisionnementController&view=approvisionnement"?>" class="btn btn-primary mb-5 mt-5">Ajouter approvisionnement</a>
        <div class="card">
            <div class="card-header text-center">
                Liste approvisionnement
            </div>
            <div class="card-body">
                <table class="table table-striped col-12 table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>prix</th>
                            <th>quantite</th>
                            <th>montant</th>
                            <th>observation</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($approvisionnementlist as $key => $value): ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $value["prixAP"] ?></td>
                            <td><?= $value["quantiteAP"] ?></td>
                            <td><?= $value["montantAC"] ?></td>
                            <td><?= $value["observation"] ?></td>
                            
                            <td>
                                <a href="<?=WEB_ROUTE.'?controller=approvisionnementController&view=edit&id='.$value['idAPP']?>" 
                                class="btn btn-secondary">Modifier</a>
                                &nbsp;&nbsp;
                                <a href="#" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>