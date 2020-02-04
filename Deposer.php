<?php
session_start();
if(!isset($_SESSION["role"]))
    {
        die("<strong>Accès resevé aux personnes enregistés</strong>");
    }
    if($_SESSION["role"]!="client")
    {
        die("<strong>Vous n'etes pas un Utilisateur</strong>");
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="/Web_Mini_Projet/mesCss/style.css" />
 <link rel="stylesheet" href="mesCss/bootstrap.min.css" />
<link rel="stylesheet" href="mesCss/fichCss.css" />
<title>Deposer un Ticket</title>
</head>

<body>
<?php include('headerutilisateur.php'); ?>
	<div class="container">
	
		<div align="center">

			<form action="traiterDeposer.php" method="GET">
				<table>
					<tr>
						<br />
					</tr>
					<tr>
						<h2>Ouverture d'un Ticket</h2>
					</tr>
					<tr>
						<td><label for=login>Message: </label></td>
						<td><TEXTAREA name="message" class="form-control" cols="50" rows="10"></TEXTAREA></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" name="submit" class="form-control">Envoyer</button></td>
					</tr>
					<tr></tr>
				</table>
			</form>
		</div>
	</div>
</body>
<?php include('footer.php'); ?>

</html>

