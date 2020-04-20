<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: http://**[IP SERVEUR ou DOMAINE]/pannel/index.html');
	exit;
}
?>

<style type="text/css">
table {
border: medium solid #6495ed;
border-collapse: collapse;
width: 50%;
}
th {
font-family: monospace;
border: thin solid #6495ed;
width: 50%;
padding: 5px;
background-color: #D0E3FA;
background-image: url(sky.jpg);
}
td {
font-family: sans-serif;
border: thin solid #6495ed;
width: 50%;
padding: 5px;
text-align: center;
background-color: #ffffff;
}
caption {
font-family: sans-serif;
}
</style>
<meta charset="utf-8" />

<?php

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=essentialmode', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM banlist');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
<center>
<table summary="BAN">
<tr>
    <th>Bannis</th>
    <th>Par</th>
    <th>Pour</th>
	<th>Permanant<br>
	(0= NON / 1 = OUI)</br></th>
</tr>


<tr>
<td><?php echo $donnees['targetplayername'];?></td>
<td><?php echo $donnees['sourceplayername'];?></td>
<td><?php echo $donnees['reason'];?></td>
<td><?php echo $donnees['permanent'];?></td>
</tr>
</table>


<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
