<?php

function connexionBase()
{
    $host="localhost"; 
    $login= "dfadika";  // loggin d'accès au serveur de BDD 
    $password="df19225";    // pour s'identifier auprès du serveur
    $base = "dfadika";

   try 
   {
      
       $db= new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base, $login, $password);
       return $db;
    } 
    
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    } 
}
?>