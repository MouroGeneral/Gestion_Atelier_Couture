<?php 
require_once(ROUTE_DIR."view/inc/menu.inc.html.php");
?>
<style>
    .submit{
        width: 90%;
        margin-top: 5%;
        margin-left: 20%;
    }
    table{
        border: 2px solid;
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
        padding:5px;
    }
    th{
        border: 2px solid black;
        color: #fff;
        background-color: black;
    }
    td{
        border: 2px solid black;
    }
    .modifier{
        color: #fff;
        background-color: green;
    }
    .suprimer{
        color: #fff;
        background-color: red;
    }
</style>
<div class="a">
<a href="<?=WEB_ROUTE."?controller=categoriearticleventeController&view=categoriearticlevente_add"?>" class="btn btn-primary mb-5 mt-5"><h1><center>Ajouter categoriearticlevente</center></h1></a>
</div>
<div class="card">
            <div class="card-header text-center">
                <h2><center>Liste categorie de ventes</center></h2>
            </div>
            <section>
            <div class="card-body">
                <table class="table table-striped col-12 table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>categorie de vente</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categoriearticleventelist as $key => $value): ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $value["libellecav"] ?></td>
                            <td>
                                <a href="<?=WEB_ROUTE.'?controller=categoriearticleventeController&view=edit&idCAV='.$value['idCAV']?>" 
                                class="modifier">Modifier</a>
                                &nbsp;&nbsp;
                                <a href="#" class="suprimer">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </section>
        </div>



<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>