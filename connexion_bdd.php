<?php

function connexionBase()
{
    // $host="localhost"; 
    // $login= "dfadika";  // loggin d'accès au serveur de BDD 
    // $password="df19225";    // pour s'identifier auprès du serveur
    // $base = "dfadika";

    $host="localhost"; 
    $login= "root";  // loggin d'accès au serveur de BDD 
    $password="";    // pour s'identifier auprès du serveur
    $base = "jarditou";

   try 
   {
      
       $db= new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base, $login, $password);
    //    $db= new PDO('mysql:host='.$host.':3308;charset=utf8;dbname='.$base, $login, $password);
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