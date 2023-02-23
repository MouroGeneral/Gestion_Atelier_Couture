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
        width: 100%;
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
<a href="<?=WEB_ROUTE."?controller=categorieController&view=categorie"?>" class="btn btn-primary mb-5 mt-5"><h1><center>Ajouter categorie</center></h1></a>

</div>
<h2><center> Liste les categories de confection</center></h2>
<section>
        
          
            
          
            <div class="card-body">
                <table class="c">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categorie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="s">
                        <?php foreach ($categorieconfectionlist as $key => $value): ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $value["libelleCC"] ?></td>
                            <td>
                                <a href="<?=WEB_ROUTE.'?controller=categorieController&view=edit&id='.$value['id']?>" 
                                class="modifier">Modifier</a>
                                &nbsp;&nbsp;
                                <a href="<?=WEB_ROUTE.'?controller=categorieController&view=delet&id='.$value['id']?>" class="suprimer">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
       
 
    
</section>

<?php require_once(ROUTE_DIR."view/inc/end-menu.inc.html.php") ?>
<?php require_once(ROUTE_DIR."view/inc/footer.inc.html.php") ?>