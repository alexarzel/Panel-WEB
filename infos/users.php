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
 <th>Steam Hex</th>
 <th>Nom Steam</th>
 <th>Money</th>
 <th>Bank</th>
</thead>
<?php
$reponse = $bdd->query('SELECT * FROM users');
 while($donnees=$reponse->fetch())
 {
  echo
  '<tr>
  <td><center>' . $donnees['identifier'] . '</td><td><center>' . $donnees['name'] . '</td><td><center>' . $donnees['money'] . '</td><td><center>' . $donnees['bank'] . '</td>
    <td>
   
    <form method="post" class="deleteform" action="delete_users.php">
    <input type="hidden" name="money" value="'. $donnees['money'] . '">
    <input type="submit" name="supprimer" class="delete" value="Supprimer">
</form>
   
    </td>
  </tr>';
 }
?>
