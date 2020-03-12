<?php 

$libelleTable = ['ID', 'Référence', 'Catégorie', 'Libellé', 'Description', 'Prix', 'Stock', 'Couleur', 'Photo', 'Bloqué', 'Date d\'ajout', 'Date de modification']; // tableau reprenant les intitulés des colonnes de la base de données

include 'functions.php'; // appel de la page de fonctions

$products = products(); //fonction products

$pro_id = $_GET['pro_id']  ?? ''; // récupération de la valeur pro_id des elements de la colonne libellé

$card_id = $_GET['card_id'] ?? ''; // récupération de la valeur card_id pour l'affichage de la carte


$ids = $_GET['productsToDelete'] ?? ''; // récupération des valeurs pour la suppression des ids sélectionnés
if(isset($_GET['deleteAsk'])) // Si la valeur validé (du bouton validé de la fenetre modale) existe 
{
        if(diversDeleteProducts($ids)) // appel de la fonction diversDeleteProducts qui a pour argument les valeurs sélectionnées ($ids)
        {
            redirection(); // Si la fonction diversDeleteProducts a été executé la fonction redirection s'éxecute aussi
        } ; 
}

?>

<?php include_once "topOfPage.php" ?> 
<div class="container-fluid">
    <div class="row pt-3">    
        <div class="col-md-7 px-1 mx-0 row">
            <div class="table pt-5 px-0 mr-1 col-md-10 d-flex">
                 <table class="table table-bordered table-hover border">
                    <a href="product_add.php"><button class="btn sticky-top"><i class="far fa-plus-square fa-2x plus px-0"></i></button></a></div>
                    <form method="POST" action="product_liste.php" id="formD">
                            <thead class="">
                                <tr class="">
                                    <th class="sticky-top bg-white" >Photo</th>
                                    <th class="sticky-top bg-white" >ID</th>
                                    <th class="none sticky-top bg-white" >Référence</th>
                                    <th class="sticky-top bg-white" >Libellé</th>
                                    <th class="sticky-top bg-white" >Prix</th>
                                    <th class="none sticky-top bg-white">Stock</th>
                                    <th class="none sticky-top bg-white" >Couleur</th>
                                    <th class="none sticky-top bg-white">Ajout</th>
                                    <th class="sticky-top bg-white">Modif</th>
                                    <th class="none sticky-top bg-white">Bloqué</th>
                                    <th class="none sticky-top bg-white"><i class="fas fa-trash-alt"></i></th>
                                    <th class="d-md-none fleche">
                                    <div class="btn-group dropright">
                                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropright</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- Dropdown menu links -->
                                        </div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($products as $product)
                                {
                                    $src = "assets/img/images/".$product->pro_id;
                                    if (isset($_POST['count_product_delete']))
                                    {
                                            if (isset($_POST['delete']))
                                                {
                                                    $productsToDelete= $_POST["delete"]; 
                                                    $ids = implode( ' , ', $productsToDelete);
                                                }           
                                    }               
                                ?>
                                <tr> 
                                    <td>
                                    <div class="photo  d-flex justify-content-center">
                                    <a href="product_liste.php?card_id=<?=$product->pro_id?>" data-toggle="collapse" aria-expanded="false" aria-controls="product_card"></a>
                                    <button class="btn-custom " type="button" data-toggle="collapse" data-target="#product_card" aria-expanded="false" aria-controls="product_card">
                                        <img src="<?= $src ?>" alt="photo" class="dropright post-img"></img>
                                    </button>
                                    <div>
                                    </td>
                                    <!-- <td><a href="#product_card" data-toggle="dropright" aria-expanded="false" aria-controls="product_card" class="form-control" ><img src="<?= $src ?>" alt="photo" class="dropright w-25 h-auto" ></img></a></td> -->
                                    <td><?php echo $product->pro_id; ?></td>
                                    <td class="none" ><?php echo $product->pro_ref; ?></td>
                                    <td><a href="product_details.php?pro_id=<?= $product->pro_id ?>"><?php echo  $product->pro_libelle; ?></a></td>
                                    <td><?php echo $product->pro_prix; ?></td>
                                    <td class="none" ><?php echo $product->pro_stock; ?></td>
                                    <td class="none" ><?php echo $product->pro_couleur; ?></td>
                                    <td class="none" ><?php echo $product->pro_d_ajout; ?></td>
                                    <td><a href="product_modif.php?pro_id=<?= $product->pro_id ?>"><i class="fas fa-edit fa-2x"></i></a><br><?php echo $product->pro_d_modif; ?></td>
                                    <td class="none"><?php echo $product->pro_bloque; ?></td>
                                    <td class="none"><button class="btn btn-secondary" type="submit" name="ppa"><input type="checkbox" name="delete[<?=$product->pro_id?>]" value="<?=$product->pro_id?>"></button></td>
                                    <!-- <td><button class="btn btn-secondary" type="button" name="ppa" class="btn btn-secondary" data-toggle="modal" data-target="#delete_modal"><input type="checkbox" name="delete[<?=$product->pro_id?>]" value="<?=$product->pro_id?>"></button></td> -->

                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                <tr>
                <td colspan="10"></td>
                <td><button class="btn btn-secondary" type="submit" name="count_product_delete" id="delete" value="valider">Valider </button> </td>
                <!-- <td><button type="button" form="formD" name="count_product_delete" value="Submit" class="btn btn-secondary" data-toggle="modal" data-target="#delete_modal">Valider</button></td> -->
                </tr>
                </tfoot>
                </form>
                            
            </form>
                </table>
                
            </div>
                    
                    <!-- <div class="col-md-7">
                        <form action="product_modif.php" method="POST" >
                            <button type="button" role="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete_modal">Supprimer</button>
                        </form>
                    </div> -->

                    <!-- <div class="dropdown">  
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-secondary" type="submit" name="count_product_delete" id="delete" value="valider">Valider </button></a></td>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <button type="button" role="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete_modal">Supprimer</button>
                            <a class="dropdown-item" href="#"><button type="button" role="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete_modal">Supprimer</button></a>
                        </div>
                    </div> -->

            <!-- FENETRE MODAL DELETE -->
            <div class="modal fade" id="delete_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="delete_products_modal" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" >
                
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="form-group">
                            <label for="productsToDelete" class="col-form-label">Voulez-vous vraiment supprimer : <?php foreach($productsToDelete as $value) { echo ' le produit '. $value. '; <br> '; } ?> </label>
                        </div>
                        <button type="button" name="deleteAsk" class="btn btn-secondary" role="button"><a href="product_liste.php?productsToDelete=<?=$ids?>&amp;deleteAsk=true">Oui</a></button>
                        <button type="button" name="" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        
                    </div>
                </div>
            </div>
            </div>
            <!-- FIN FENETRE MODAL DELETE -->

            <!-- DEBUT CARD -->
                <!-- <div class="collapse fixed-top bg-secondary justify-content-center d-bloc w-50" id="product_card" >
                    <div class="card w-50" >
                        <?php
                        if(isset ($_GET['card_id'])){$card_id=$_GET['card_id'];}
                        var_dump($card_id);
                        foreach ($products as $product)
                        {
                            $src = "assets/img/images/".$card_id. '.' . $product->pro_photo;
                            if ($product->pro_id==$card_id) 
                            {
                            ?>
                            <div class="row no-gutters ">
                                <div class="col-md-4">
                                    <img src="<?= $src ?>" alt="Photo" class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"> <?php echo $libelleTable[0].' : '.$product->pro_id; ?> </li>
                                            <li class="list-group-item"> <?php echo $libelleTable[1].' : '.$product->pro_ref; ?> </li>
                                            <li class="list-group-item"> <?php echo $libelleTable[2].' : '.$product->pro_libelle; ?> </li>
                                            <li class="list-group-item"> <?php echo $libelleTable[3].' : '.$product->pro_prix; ?> </li>
                                            <li class="list-group-item"> <?php echo $libelleTable[4].' : '.$product->pro_stock; ?> </li>
                                            <li class="list-group-item"> <?php echo $libelleTable[5].' : '.$product->pro_couleur; ?> </li>
                                            <li class="list-group-item"> <?php echo $libelleTable[6].' : '.$product->pro_d_ajout; ?> </li>
                                            <li class="list-group-item"> <?php echo $libelleTable[7].' : '.$product->pro_d_modif; ?> </li>
                                            <li class="list-group-item"> <?php echo $libelleTable[8].' : '.$product->pro_bloque; ?> </li>
                            <?php
                            }
                        }
                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div> -->
                    <!-- FIN CARD  -->
        </div>
            <?php include_once "endOfPage.php" ?>