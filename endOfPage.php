<?php

$sourceCarousel =  carousel();

// foreach($sourceCarousel as $key =>$value)
// {
    $srcCarousel_0 = "assets/img/images/".$sourceCarousel[0]->pro_id;
    $srcCarousel_1 = "assets/img/images/".$sourceCarousel[1]->pro_id;
    $srcCarousel_2 = "assets/img/images/".$sourceCarousel[2]->pro_id;
?>
    <div class="d-none d-md-block col-md-3 mt-5 pr-0">
        <div id="newProductCarousel" class="carousel slide sticky-top" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class=" w-100" src="assets\img\images\in-the-garden-1328551-640x960.jpg" alt="image plantes">
                    <div class="carousel-caption">
                        <h5>Plantes, Matériel de jardinage, Terreaux, Graines,...</h5>
                        <a href="product_liste.php" type="button" class="btn btn-success">Découvrir nos produits</a>
                    </div>
                </div>
                <?php
                foreach($sourceCarousel as $key =>$value)
{
    ?>
                <div class="carousel-item">
                    <img class=" w-100" src=" <?= $srcCarousel_0 ?> " alt="image matériel">
                    <div class="carousel-caption d-block">
                        <h5 class="nomCarousel"> <?= $sourceCarousel[0]->pro_libelle ?> </h5>
                        <p class="prixCarousel"> <?= $sourceCarousel[0]->pro_prix.' euros' ?> </p>
                        <a href="product_details.php?pro_id=<?= $sourceCarousel[0]->pro_id ?>" type="button" class="btn btn-success" >Découvrir</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src=" <?= $srcCarousel_1 ?> " alt="image terreaux">
                    <div class="carousel-caption d-block">
                        <h5 class="nomCarousel"> <?= $sourceCarousel[1]->pro_libelle ?> </h5>
                        <p class="prixCarousel"> <?= $sourceCarousel[1]->pro_prix.' euros'  ?> </p>
                        <a href="product_details.php?pro_id=<?= $sourceCarousel[1]->pro_id ?>" type="button" class="btn btn-success" >Découvrir</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src=" <?= $srcCarousel_2 ?> " alt="image jardinière">
                    <div class="carousel-caption d-block">
                        <h5 class="nomCarousel"> <?= $sourceCarousel[2]->pro_libelle ?> </h5>
                        <p class="prixCarousel"> <?= $sourceCarousel[2]->pro_prix.' euros'  ?> </p>
                        <a href="product_details.php?pro_id=<?= $sourceCarousel[2]->pro_id ?>" type="button" class="btn btn-success" >Découvrir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<footer>
    <div class="pt-5" >
        <nav class="navbar navbar-dark bg-dark d-flex ">
            <ul class="nav flex flex-lg-row flex-column">
                <li class="nav-item"></li><a class="nav-link text-white" href="https://dev.amorce.org/mnobrega/prestashop/index.php?id_cms=2&controller=cms&id_lang=1" title="les mentions légales">Mentions légales</a></li>
                <li class="nav-item"></li><a class="nav-link text-white" href="horaires/horaires.docs" title="les horaires">Horaires</a></li>
                <li class="nav-item"></li><a class="nav-link text-white" href="plan.docs" title="le plan du site">Plan du site</a></li>
            </ul>
        </nav>
    </div>               
</footer>
</div>
<script src="assets/js/javascript.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>

</html>