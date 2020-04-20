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
    $id_del = $_POST['id'];
 $bdd->query("DELETE FROM characters WHERE id=" . $id_del); 
 header('Location: register.php');
         }
?>