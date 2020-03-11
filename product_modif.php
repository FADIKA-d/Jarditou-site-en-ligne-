<?php 
require 'functions.php'; // appel de la pages des fonctions

// redirection vers la page liste si il n'y a pas de GET
if(!isset($_GET['pro_id']) && !isset($_POST['pro_id'])){
    header('Location:product_liste.php');
    exit();
}

$pro_id = $_GET['pro_id'] ?? $_POST['pro_id'];   // initialisation de la variable GET 

$productModif = productdetails($pro_id); // initialisation de la fonction productdetails avec comme argument $pro_id

// recupération des catégories pour alimenter les options de mon select
$categories = getCategories();

// Initialisation de mes variables avec les posts ou vide
$pro_ref = $_POST['pro_ref'] ?? '';
$pro_cat_id = $_POST['pro_cat_id'] ?? '';
$pro_libelle = $_POST['pro_libelle'] ?? '';
$pro_description = $_POST['pro_description'] ?? '';
$pro_prix = $_POST['pro_prix'] ?? '';
$pro_stock = $_POST['pro_stock'] ?? '0' ;
$pro_couleur = $_POST['pro_couleur'] ?? '';
$pro_photo = $_POST['pro_photo'] ?? '';
$pro_bloque = $_POST['pro_bloque'] ?? 0;
$pro_d_ajout = $_POST['pro_d_ajout'] ?? '';
$isSubmit = isset($_POST['submit']) ? true : false;

//regex
$pro_ref_control = '/^\w{1,10}$/';//regex au moins un caractère au plus 10 caracrtères attachés
$pro_libelle_control = '/\w{1,200}/'; // regex jusqu'à 200 caractères
$pro_description_control = '/\w{0,1000}/'; 
$pro_prix_control = '/^\d{1,6}([.|,](\d{1,2}))?$/'; //Regex prix de six chiffres avant la virgule et deux chiffres après
$pro_stock_control = '/^\d{0,11}$/'; // regex 0 ou 11 chiffres
$pro_couleur_control = '/^[a-zA-Z]{0,30}$/' ; //regex uniquement des lettres au moins une jusqu'a 30 caractères 
$pro_photo_control = '/^[a-zA-Z]{1,4}$/';

//declaration et initialisation du tableau d'erreurs
$errors = [];  

// Test de validation des données stockées dans les variables
if($isSubmit && (!preg_match($pro_ref_control, $pro_ref))) //condition si : regex est faux 
{
    $errors['pro_ref']='La référence saisie n\'est pas valide'; //execute : le tableau errors prend la valeur entre cotes pour l'index entre crochet
}
if($isSubmit && (!isset($pro_cat_id)))
{
    $errors['pro_cat_id'] = 'La catégorie n\'a pas été renseignée';
}
if($isSubmit && (!preg_match($pro_libelle_control, $pro_libelle))) //condition si : regex est faux 
{
    $errors['pro_libelle']='Le libellé saisie n\'est pas valide'; //execute : le tableau errors prend la valeur entre cotes pour l'index entre crochet
}
if($isSubmit && ((!preg_match($pro_prix_control, $pro_prix)) || $pro_prix == 0)) //condition si : regex est faux 
{
    $errors['pro_prix'] = 'Le prix saisie n\'est pas valide' ; //execute : le tableau errors prend la valeur entre cotes pour l'index entre crochet
}
if($isSubmit && (!preg_match($pro_description_control, $pro_description))) //condition si : regex est faux 
{
    $errors['pro_description']='La description du produit est trop longue'; //execute : le tableau errors prend la valeur entre cotes pour l'index entre crochet
}
if($isSubmit && (!preg_match($pro_couleur_control, $pro_couleur))) //condition si : regex est faux 
{
    $errors['pro_couleur']='La couleur saisie n\'est pas valide'; //execute : le tableau errors prend la valeur entre cotes pour l'index entre crochet
}
if($isSubmit && (!preg_match($pro_stock_control, $pro_stock))) //condition si : regex est faux 
{
    $errors['pro_stock']='La valeur du stock doit être inférieur à 11 chiffres '; //execute : le tableau errors prend la valeur entre cotes pour l'index entre crochet
}

// chemin vers le fichier image si l'image existe
$src = "assets/img/images/".$productModif['pro_id'] ;

//modification du fichier image
if (isset($_FILES['pro_photo'])) 
{
    $photo = $_FILES['pro_photo'] ?? '';
    $tmp = $_FILES['pro_photo']['tmp_name'];
    $path_parts= pathinfo($_FILES['pro_photo']['name']);
    $extension = $path_parts['extension'] ?? '';
    $name = $_FILES['pro_photo']['name'];
    $src = "assets/img/images/" ;
    $photoPath = $src.$name ?? '';
    if(move_uploaded_file($tmp, $photoPath))
    {
        $pro_photo = $extension ;
    }
   
}

// Test soumission du formulaire et absence d'erreurs suite à la validation 
if($isSubmit && count($errors)==0) 
{
    // appel de la fonction de maj des données d'un enrégistrement dans la table produits
    if(updateProduct($pro_id, $pro_cat_id, $pro_ref, $pro_libelle, $pro_description, $pro_prix, $pro_stock, $pro_couleur, $pro_photo, $pro_bloque))
    {
        header("Location:product_liste.php");
        exit();
    }    
    $fail=true;
}

// debut du HTML
include_once "topOfPage.php"; // appel de la page topOfPage
if(isset($fail)) // condition si echec de l'enregistrement
{ 
?>
    <p class="alert alert-danger">Le produit n'a pas été modifié !</p> //ouverture d'une alerte d'information 
<?php 
} 

// début du formulaire
?>

<div class="container-fluid">
    <div class="row pt-3">
<div class="row col-12 col-md-9">
    <form action="product_modif.php?pro_id=<?= $pro_id ?>" method="POST" enctype="multipart/form-data" class="col-12 col-lg-7">
        <div class="form-group">
            <label for="pro_id">ID</label>
            <input type="text" name="pro_id" id="pro_id" value="<?= $productModif['pro_id'] ?>" class="form-control" readonly >
        </div>    
        <div class="form-group">
            <label for="pro_ref">Référence</label>
            <input type="text" name="pro_ref" id="pro_ref" value="<?= $productModif['pro_ref'] ?>" 
            class="form-control  <?= ($isSubmit && isset($errors['pro_ref'])) ? 'is-invalid' : '';?> <?= ($isSubmit && (!isset($errors['pro_ref']))) ? 'is-valid' : '';?> ">
            <div class=" <?=($isSubmit && isset($errors['pro_ref'])) ? 'invalid-feedback' : ''?>"> <?=isset($errors['pro_ref']) ? $errors['pro_ref'] : '' ?></div>
        </div>
        <div class="form-group">
            <label for="pro_cat_id">Catégorie</label>
            <select name="pro_cat_id" id="pro_cat_id" class="form-control <?= ($isSubmit && isset($errors['pro_cat_id'])) ? 'is-invalid' : '';?> <?= ($isSubmit && (!isset($errors['pro_cat_id']))) ? 'is-valid' : '';?> ">
            <?php foreach($categories as $category) { 
                if ($productModif['pro_cat_id'] == $category->cat_id)
                {
                ?>
                    <option value =" <?= $category->cat_id ?>" selected > 
                    <?= $category->cat_id.'. '.$category->cat_nom ?> 
                    </option>
                <?php 
                }
                else {
                    ?>
                    <option value="<?= $category->cat_id ?>" 
                    <?php ($pro_cat_id == $category->cat_id) ? $category->cat_nom : 'choisir' ?> 
                    > 
                    <?= $category->cat_id.'. '.$category->cat_nom ?>
                    </option>
                <?php 
                }
                 } 
                 ?>              
            </select>
            <div class=" <?=($isSubmit && isset($errors['pro_cat_id'])) ? 'invalid-feedback' : ''?>"> <?=(isset($errors['pro_cat_id'])) ? $errors['pro_cat_id'] : '' ?></div>
        </div>
        <div class="form-group">
            <label for="pro_libelle">Libellé</label>
            <input type="text" name="pro_libelle" id="pro_libelle" value="<?=$productModif['pro_libelle']?>" class="form-control <?= ($isSubmit && isset($errors['pro_libelle'])) ? 'is-invalid' : '';?> <?= ($isSubmit && (!isset($errors['pro_libelle']))) ? 'is-valid' : '';?> ">
            <div class=" <?=($isSubmit && isset($errors['pro_libelle'])) ? 'invalid-feedback' : ''?>"> <?=(isset($errors['pro_libelle'])) ? $errors['pro_libelle'] : '' ?></div>
        </div>
        <div class="form-group">
            <label for="pro_description">Description</label>
            <input type="text" name="pro_description" id="pro_description" value="<?=$productModif['pro_description']?>"
                class="form-control <?= ($isSubmit && isset($errors['pro_description'])) ? 'is-invalid' : '';?> ">
            <div class=" <?=($isSubmit && isset($errors['pro_description'])) ? 'invalid-feedback' : ''?>"> <?=(isset($errors['pro_description'])) ? $errors['pro_description'] : '' ?></div>
        </div>
        <div class="form-group">
            <label for="pro_prix">Prix</label>
            <input type="text" name="pro_prix" id="pro_prix" value="<?=$productModif['pro_prix']?>" class="form-control <?= ($isSubmit && isset($errors['pro_prix'])) ? 'is-invalid' : '';?> <?= ($isSubmit && (!isset($errors['pro_prix']))) ? 'is-valid' : '';?> ">
            <div class=" <?=($isSubmit && isset($errors['pro_prix'])) ? 'invalid-feedback' : ''?>"> <?=(isset($errors['pro_prix'])) ? $errors['pro_prix'] : '' ?></div>
        </div>
        <div class="form-group">
            <label for="pro_stock">Stock</label>
            <input type="text" name="pro_stock" id="pro_stock" value="<?=$productModif['pro_stock']?>" class="form-control <?= ($isSubmit && isset($errors['pro_stock'])) ? 'is-invalid' : '';?> <?= ($isSubmit && ($pro_stock!='0')) ? 'is-valid' : '';?> ">
            <div class=" <?=($isSubmit && isset($errors['pro_stock'])) ? 'invalid-feedback' : ''?>"> <?=(isset($errors['pro_stock'])) ? $errors['pro_stock'] : '' ?></div>
        </div>
        <div class="form-group">
            <label for="pro_couleur">Couleur</label>
            <input type="text" name="pro_couleur" id="pro_couleur" value="<?=$productModif['pro_couleur']?>" class="form-control <?= ($isSubmit && isset($errors['pro_couleur'])) ? 'is-invalid' : '';?> ">
            <div class=" <?=($isSubmit && isset($errors['pro_couleur'])) ? 'invalid-feedback' : ''?>"> <?=(isset($errors['pro_couleur'])) ? $errors['pro_couleur'] : '' ?></div>
        </div>
         <div class="custom-file">
            <label for="pro_photo" class="custom-file-label" >Photo</label>
            <input type="hidden" name="pro_photo" value="<?=$productModif['pro_photo']?>">
            <input type="file" name="pro_photo" id="pro_photo"  class="custom-file-input <?= ($isSubmit && isset($errors['pro_photo'])) ? 'is-invalid' : '';?> <?= ($isSubmit && (!isset($errors['pro_photo']))) ? 'is-valid' : '';?> ">
            <div class=" <?=(isset($errors['pro_photo'])) ? 'invalid-feedback' : ''?>"> <?=(isset($errors['pro_photo'])) ? $errors['pro_photo'] : '' ?></div>
            <div class="<?=($isSubmit && (!isset($errors['pro_photo']))) ? 'valid-feedback' : ''?>"><?php if(isset($$extension)) { ?> <img class="w-auto h-auto" src="<?= $extension ?>"></img> <?php ;} ?></div>
        </div>
            <div class="<?= (!isset($extension)) ? 'invalid-feedback' : '' ?>"> <?=(isset($errors['pro_photo'])) ? $errors['pro_photo'] : '' ;?> </div>
            <div class="<?= (isset($photo) && (!isset($_FILES['pro_photo']))) ? 'is-valid' : '' ; ?> "> 
                <img class="w-auto h-auto" src="<?= (isset($photo)) && (!isset($_FILES['pro_photo'])) ? $src : '' ?>"></img>
                <span> <?=($isSubmit && isset($photo) && (!isset($_FILES['pro_photo']))) ? $productModif['pro_photo'] : '' ?> </span>
            </div> 
            <div class="<?= ($isSubmit && (isset($_FILES['pro_photo']))) ? 'is-valid' : '';?>"> 
                <img class="w-auto h-auto" src="<?=($isSubmit && (isset($_FILES['pro_photo']))) ?  $photoPath : '' ; ?>"></img>
                <!-- <span><?= ($isSubmit && (isset($_FILES['pro_photo']))) ? $extension : '' ; ?></span> -->
            </div> 
        <div class="form-check">
            <label for="pro_bloque" class="form-check-label">Produit bloqué : </label>
            <input type="checkbox" name="pro_bloque" class=" custom-control-input" id="pro_bloque"
                value="1" <?=($pro_bloque ==1) ? 'checked': '' ?> data-toggle="toggle" data-on="Oui" data-off="Non" data-onstyle="secondary"
                data-offstyle="default">
        </div>
        <div class="form-group">
            <input type="hidden" name="pro_d_ajout" id="pro_d_ajout" value="<?=date("Y-m-d")?>" class="form-control">
        </div>
        <button class="btn btn-secondary"><a href="product_liste.php">Annuler</a></button>
        <button type="submit" name="submit" class="btn btn-secondary">Enregistrer</button>
    </form>
</div>
</div>
<?php include_once "endOfPage.php" ?>