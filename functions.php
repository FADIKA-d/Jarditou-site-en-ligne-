<?php
    require "connexion_bdd.php"; 
    // page de connexion

    function getCategories() 
    {
        // Appel de la fonction de connexion
        $db = connexionBase();
        $sql = "SELECT `cat_id`, `cat_nom` FROM `jarditou_categories`";
        $req = $db->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    function productdetails($pro_id)
    {
        $db = connexionBase(); // Appel de la fonction de connexion
        $sql = "SELECT `pro_id`, `pro_ref`, `pro_cat_id`, `pro_libelle`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_bloque`, `pro_d_ajout`, `pro_d_modif` FROM `jarditou_produits` WHERE `pro_id`= :pro_id ";
        $req = $db->prepare($sql);
        $req->bindParam(':pro_id', $pro_id);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    function products()
    {
        $db = connexionBase(); 
        $sql = "SELECT `pro_id`, `pro_cat_id`, `pro_ref`, `pro_libelle`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_d_modif`, `pro_bloque` FROM `jarditou_produits`";
        $req = $db->query($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    function addProduct($pro_cat_id, $pro_ref, $pro_libelle, $pro_description, $pro_prix, $pro_stock, $pro_couleur, $pro_photo)
    {
        $db = connexionBase();
        $sql = "INSERT INTO `jarditou_produits` (`pro_cat_id`, `pro_ref`, `pro_libelle`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`) VALUES
        (:pro_cat_id, :pro_ref, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, NOW())";
        $requete = $db->prepare($sql);
        $requete->bindValue(':pro_cat_id', $pro_cat_id) ;
        $requete->bindValue(':pro_ref', $pro_ref);
        $requete->bindValue(':pro_libelle', $pro_libelle);
        $requete->bindValue(':pro_description', $pro_description);
        $requete->bindValue(':pro_prix', $pro_prix);
        $requete->bindValue(':pro_stock', $pro_stock);
        $requete->bindValue(':pro_couleur', $pro_couleur);
        $requete->bindValue(':pro_photo', $pro_photo);
        if($requete->execute())
        {
            return $db->lastInsertId();
        }
        return false;
    }

    function deleteProduct($pro_id)
    {
        $db = connexionBase();
        $sqlDel = "DELETE FROM `jarditou_produits` WHERE `pro_id`= :pro_id";
        $requete = $db->prepare($sqlDel);
        $requete->bindParam(':pro_id', $pro_id,PDO::PARAM_INT);
        return $requete->execute();
    }

    function diversDeleteProducts($ids)
    {
        $db = connexionBase();
       
        $sqlDel = "DELETE FROM `jarditou_produits` WHERE `pro_id` IN ($ids)";
        $requete = $db->prepare($sqlDel);
        return $requete->execute() ; 
    }

    

    function uploads($photo, $name)
    {
        $path_parts= pathinfo($photo['name']);
        $allowedExtensions=['jpg', 'jpeg','png'];
        $extension = $path_parts['extension'];
        $maxFileSize = 2;
        if (($photo['name']['size'] < $maxFileSize) && in_array($extension, $allowedExtensions))
        {
            $tmp = $photo['tmp_name'];
            $src = 'assets/img/images/'. $name;
            if(move_uploaded_file($tmp, $src))
            {
                return $extension;
            }
            return false;
        }
    }
    
    function updateProduct($pro_id, $pro_cat_id, $pro_ref, $pro_libelle, $pro_description, $pro_prix, $pro_stock, $pro_couleur, $pro_photo, $pro_bloque)
    {
        $db = connexionBase();
        $sql = "UPDATE `jarditou_produits` 
        SET `pro_cat_id`=:pro_cat_id,`pro_ref`=:pro_ref,`pro_libelle`=:pro_libelle,`pro_description`=:pro_description,`pro_prix`=:pro_prix,`pro_stock`=:pro_stock,`pro_couleur`=:pro_couleur,`pro_photo`=:pro_photo, `pro_d_modif`= NOW(),`pro_bloque`=:pro_bloque 
        WHERE `pro_id`= :pro_id";
        $requete = $db->prepare($sql);
        $requete->bindParam(':pro_cat_id', $pro_cat_id);
        $requete->bindParam(':pro_ref', $pro_ref);
        $requete->bindParam(':pro_libelle', $pro_libelle);
        $requete->bindParam(':pro_description', $pro_description);
        $requete->bindParam(':pro_prix', $pro_prix);
        $requete->bindParam(':pro_stock', $pro_stock);
        $requete->bindParam(':pro_couleur', $pro_couleur);
        $requete->bindParam(':pro_photo', $pro_photo);
        $requete->bindParam(':pro_bloque', $pro_bloque);    
        $requete->bindParam(':pro_id', $pro_id);
        return $requete->execute(); 
    }

    function redirection() 
        {
            header("Location:product_liste.php");
            exit();
        }

    function security($data)
    {
        $data= trim($data);
        $data= stripslashes($data);
        $data= strip_tags($data);
        return $data;
    }

    