<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="/Web_Mini_Projet/mesCss/style.css" />
<title>Inscription</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--Made with love by Mutiullah Samim -->
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<style type="text/css">
</style>
</head>

<body>
<?php include('headerutilisateur.php'); ?>
	<div class="container">
	
		<div align="center">

			<form action="traiterInscripUti.php" method="GET">
				<table>
					<tr>
						<br />
					</tr>
					<tr>
						<h2>Sign Up! </h2>
					</tr>
					<tr>
						<td><label for=login>NOM: </label></td>
						<td><input type="text" class="form-control" name="nom"><br></td>
					</tr>
					<tr>
						<td><label for=login>PRENOM: </label></td>
						<td><input type="text" class="form-control" name="prenom"><br></td>
					</tr>
					<tr>
						<td><label for=login>EMAIL: </label></td>
						<td><input type="text" class="form-control" name="email"><br></td>
					</tr>
					<tr>
						<td><label for=login>LOGIN: </label></td>
						<td><input type="text" class="form-control" name="login"><br></td>
					</tr>
					<tr>
						<td><label for=pass>MOT DE PASSE: </label></td>
						<td><input type="password" class="form-control" name="pass"><br></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" name="submit">Enregister</button></td>
					</tr>
					<tr></tr>
				</table>
			</form>
		</div>
	</div>
</body>
<?php include('footer.php'); ?>

</html>

