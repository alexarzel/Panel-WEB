<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: http://**[IP SERVEUR ou DOMAINE]/pannel/index.html');
	exit;
}
?>

<?php
try
{
 $bdd = new PDO('mysql:host=localhost;dbname=essentialmode;charset=utf8','root', '');
}
catch (Exception $e){
 die('Erreur : ' . $e->getMessage());
}
?>
<center>
<table class="table table-hover">
<thead>
 <th>ID</th>
 <th>Firstname</th>
 <th>Lastname</th>
 <th>Steam</th>
</thead>
<?php
$reponse = $bdd->query('SELECT * FROM characters');
 while($donnees=$reponse->fetch())
 {
  echo
  '<tr>
  <td><center>' . $donnees['id'] .'</td><td><center>' . $donnees['firstname'] . '</td><td><center>' . $donnees['lastname'] . '</td><td><center>' . $donnees['identifier'] . '</td>
    <td>

    <form method="post" class="deleteform" action="delete_register.php">
    <input type="hidden" name="id" value="'. $donnees['id'] . '">
    <input type="submit" name="supprimer" class="delete" value="Supprimer">
</form>

    </td>
  </tr>';
 }
?>
