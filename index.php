<?php 
 require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
 
 $db = connexionBase(); // Appel de la fonction de connexion
 
 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link
            href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/litera/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-pLgJ8jZ4aoPja/9zBSujjzs7QbkTKvKw1+zfKuumQF9U+TH3xv09UUsRI52fS+A6"
            crossorigin="anonymous">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link
            href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css"
            rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid">
            <div class="card  bg-dark text-white" >
                <img classe="card-img" id="card-img" src="assets/img/images/jardin.jpg" alt="card image jardin">
                <div class="card-img-overlay">
                    <div class="card-header d-flex justify-content-between font-weight-bold text-light row">
                           <img src="assets\img\images\jarditou_logo.jpg" alt="Logo jarditou" class="w-25 col-12 col-md-3">
                        <!-- <img   classe="" src="assets\img\images\jarditou_logo_index.png" alt="card image jardin" style="width: 10%;"> -->
                        <div class="col-12 col-md-9 pt-4" id="phrase_index">Tout pour le jardin</div>
                    </div>
                    <div class="card-body pt-0">
                        <nav class="navbar navbar-expand-md navbar-dark d-flex justify-content-center">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="navbarToggler">
                                <ul class="navbar-nav pt-0 pt-md-5 ">
                                    <li class="nav-item index mx-3"><a class="nav-link font-weight-bold text-light btn btn-outline-light"href="index.php">Accueil</a></li>
                                    <li class="nav-item index mx-3"><a class="nav-link font-weight-bold text-light btn btn-outline-light" href="formulaire.php">Contact</a></li>
                                    <li class="nav-item index mx-3"><a class="nav-link font-weight-bold text-light btn btn-outline-light" href="product_liste.php">Produits</a> </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pub col-12 d-none d-md-flex px-0 flex-wrap">
            <img src="assets\img\images\promotion.jpg" alt="image promotion" class="w-100 h-auto rounded pt-2">
        </div>
        </div>
        <?php include_once "endOfPage.php" ?>



        <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-home"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="formulaire.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="product_liste.php">Produits</a></li>
                </ul>
            </div>
        </nav> -->