
    <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/litera/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-pLgJ8jZ4aoPja/9zBSujjzs7QbkTKvKw1+zfKuumQF9U+TH3xv09UUsRI52fS+A6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    

</head>

<body>
<div class="container-fluid d-flex justify-content-between row">
    <div class="d-flex col-9 col-md-12 d-flex row">
        <div class="col-12 col-md-6 ">
            <picture >
                <source media="(min-width: 768px)" srcset="assets\img\images\jarditou_logo.jpg">
                <source media="(min-width: 0px)" srcset="assets\img\images\jarditou_logo_mobil.png" >
                <img src="assets\img\images\jarditou_logo.jpg" alt="Logo jarditou" class="w-50 w-md-25">
            <picture>
        </div>   
        <div class="col-12 col-md-6 text-justify pt-4" id="phrase">Tout pour le jardin</div>
    </div>
    <div class="col-3 col-md-12 d-flex justify-content-center d-md-block">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-home"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="formulaire.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="product_liste.php">Produits</a></li>
                </ul>
            </div>
            <div>
            <button name="modif" type="button" class="btn text-light" data-toggle="modal" data-target="#modif_modal"><i class="fas fa-search"></i></button>
            </div>
        </nav>
    </div>
    <div class="pub col-12 d-none d-md-flex flex-wrap">
            <img src="assets\img\images\promotion.jpg" alt="" class="w-100 h-auto rounded pt-2">
        </div>
        
</div>
<!-- DEBUT FENETRE MODAL MODIF -->
<div class="modal fade" id="modif_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modif_liste_modal" aria-hidden="true" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" >
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <form action="product_details.php" method="POST">
                                <div class="form-group">
                                    <label for="pro_id" class="col-form-label">Quel produit recherchez-vous ? (indiquez l'ID) </label>
                                    <input name="pro_id" id="pro_id" type="text" class="form-control" value="">
                                    <button type="submit" name="submit" class="btn btn-secondary" role="button">Valider</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- FIN FENETRE MODAL MODIF -->
        
   
