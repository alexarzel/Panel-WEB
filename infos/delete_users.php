<?php
ini_set('display_errors', 1);
try
{
 $bdd = new PDO('mysql:host=localhost;dbname=essentialmode;charset=utf8','root', '');
}
catch (Exception $e){
 die('Erreur : ' . $e->getMessage());
} 
   if(isset($_POST['supprimer']))
        {
    $identifier_del = $_POST['money'];
 $bdd->query("DELETE FROM users WHERE money=" .$identifier_del); 
 header('Location: users.php');
         }
?>