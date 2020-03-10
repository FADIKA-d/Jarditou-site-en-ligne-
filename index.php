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
            <div class="card bg-dark text-white" style="width: 100%;">
                <img
                    classe="card-img"
                    src="assets/img/images/jardin.jpg"
                    alt="card image jardin"
                    style="width: 100%;">
                <div class="card-img-overlay">
                    <div
                        class="card-header d-flex justify-content-between font-weight-bold text-light">
                        <img
                            classe=""
                            src="assets/img/images/jarditou_logo.jpg"
                            alt="card image jardin"
                            style="width: 10%;">
                        <p>Tout pour le jardin</p>
                    </div>
                    <div class="card-body">
                        <nav class="navbar navbar-expand-md ">
                            <button
                                class="navbar-toggler navbar-toggler-right"
                                type="button"
                                data-toggle="collapse"
                                data-target="#navbarToggler"
                                aria-controls="navbarToggler">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div
                                class="collapse navbar-collapse d-flex justify-content-around "
                                id="navbarToggler">
                                <ul class="navbar-nav ">
                                    <li class="nav-item">
                                        <a
                                            class="nav-link font-weight-bold text-light btn btn-outline-light"
                                            href="index.php">Accueil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            class="nav-link font-weight-bold text-light btn btn-outline-light"
                                            href="formulaire.php">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            class="nav-link font-weight-bold text-light btn btn-outline-light"
                                            href="product_liste.php">Produits</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once "endOfPage.php" ?>