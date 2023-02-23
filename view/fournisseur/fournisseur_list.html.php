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
<a href="<?=WEB_ROUTE."?controller=fournisseurController&view=fournisseur_add"?>" class="btn btn-primary mb-5 mt-5"><h1><center>Ajouter fournisseur</center></h1></a>
</div> 
<div class="card">
            <div class="card-header text-center">
               <h2><center> Liste Fournisseur</center></h2>
            </div>
            <div class="card-body">
                <table class="table table-striped col-12 table-responsive">
                    <thead>
                    <div class="rechercher">
            <form action="<?= WEB_ROUTE ?>" method="get">
                <input type="hidden" name="controller" value="fournisseurController">
                <input type="hidden" name="view" value="filtrer">
                <label for="">Fillter</label>
                <input type="text" name="recherche" class="butt">
                <button class="butte" name="OK">OK</button>
            </form>
        </div>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Telephone</th>
                            <th>Adresse</th>
                            <th>images</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($fournisseurlist)){
                           
                       
                        foreach ($fournisseurlist as $key => $value): ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $value["nom"] ?></td>
                            <td><?= $value["prenom"] ?></td>
                            <td><?= $value["telephone"] ?></td>
                            <td><?= $value["adresse"] ?></td>
                            <td><img id="img-product" src="image/<?php echo $value['photoF'];?>" alt=""></td>
                            
                            <td>
                            <a href="<?=WEB_ROUTE.'?controller=fourisseurController&view=editer&idF='.$value['idF']?>" 
                                class="modifier">Modifier</a>
                                &nbsp;&nbsp;
                                <a href="<?=WEB_ROUTE.'?controller=fournisseurController&view=delete&idF='.$value['idF']?>" 
                                class="suprimer">Supprimer</a>
                               

                            </td>
                        </tr>
                        <?php endforeach;
                         }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>