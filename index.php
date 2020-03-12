<?php 
 include 'functions.php'; // appel de la page de fonctions

 
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
                            
                            <div class="collapse navbar-collapse justify-content-center" id="navbarToggler">
                                <ul class="navbar-nav pt-0 pt-md-5 ">
                                    <li class="nav-item index mx-3"><a class="nav-link font-weight-bold" href="index.php">Accueil</a></li>
                                    <li class="nav-item index mx-3"><a class="nav-link font-weight-bold" href="formulaire.php">Contact</a></li>
                                    <li class="nav-item index mx-3"><a class="nav-link font-weight-bold" href="product_liste.php">Produits</a> </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pub col-12 d-none d-md-block d-md-flex px-0 flex-wrap">
                <img src="assets\img\images\promotion.jpg" alt="image promotion" class="w-100 h-auto rounded pt-2">
            <div>
                <div class="row pt-3">
                    <div class="row col-12 col-md-7 px-1 mx-0 justify-content-center pt-5">
                        <div class="pt-5 px-0 mr-1 col-md-10 ">
                            <h1 class="">Accueil</h1> 
                                <hr>
                                <section>
                                    <article>
                                        <h4>L'entreprise</h4>
                                        <p>Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.</p>
                                        <p>Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
                                        <p>Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie.</p>
                                    </article>
                                </section>
                                <section>
                                    <article>
                                        <h4>Qualité</h4>
                                        <p>Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.</p>
                                        <p>Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>
                                    </article>
                                    <article>
                                        <h4>Devis gratuit</h4>
                                        <p>Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.</p>
                                    </article>
                                </section>
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