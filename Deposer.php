<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="/Web_Mini_Projet/mesCss/style.css" />
 <link rel="stylesheet" href="mesCss/bootstrap.min.css" />
<link rel="stylesheet" href="mesCss/fichCss.css" />
<title>Inscription</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--Made with love by Mutiullah Samim -->
</head>

<body>
<?php include('headerutilisateur.php'); ?>
	<div class="container">
	
		<div align="center">

			<form action="ouverture.php" method="POST">
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

