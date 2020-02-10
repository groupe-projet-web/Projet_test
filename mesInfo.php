<?php
session_start();
require_once 'connexion.php';
if(!isset($_SESSION["role"]))
{
    die("<strong>Accès resevé aux personnes enregistés</strong>");
}
if($_SESSION["role"]!="client")
{
    die("<strong>Vous n'etes pas un Utilisateur</strong>");
}
// Création du texte de la requ�te
$reqtxt="select nom,prenom,email,login from utilisateur where login=:log";

// Préparation
$req=$maCnx->prepare($reqtxt);
$req->bindParam(':log',$_SESSION['login']);


$req->execute();

//R�cup�ration des donn�es dans un tableau associatif
$tabRes=$req->fetchAll(PDO::FETCH_ASSOC);

 if(count($tabRes)==1)

 $Res=$tabRes[0];
            
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="/Web_Mini_Projet/mesCss/style.css" />
 <link rel="stylesheet" href="mesCss/bootstrap.min.css" />
<link rel="stylesheet" href="mesCss/fichCss.css" />
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
    <title>Mes informations</title>
</head>


<body>
<?php include('headerutilisateur.php'); ?>
	<div class="container">
	
		<div align="center">

			<form action="traitermesInfo.php" method="GET">
				<table>
					<tr>
						<br />
					</tr>
					<tr>
						<h2>Mes Informations </h2>
					</tr>
					<tr>
						<p>Vous ne pouvez changer que votre mot de passe! </p>
					</tr>
					<tr>
						<td><label for=login>NOM: </label></td>
						<td><input type="text" class="form-control" name="nom" placeholder="<?php echo $Res['nom'];?>"disabled ><br></td>
					</tr>
					<tr>
						<td><label for=login>PRENOM: </label></td>
						<td><input type="text" class="form-control" name="prenom"  placeholder="<?php echo $Res['prenom'];?>" disabled><br></td>
					</tr>
					<tr>
						<td><label for=login>EMAIL: </label></td>
						<td><input type="text" class="form-control" name="email" placeholder="<?php echo $Res['email'];?>" disabled><br></td>
					</tr>
					<tr>
						<td><label for=login>LOGIN: </label></td>
						<td><input type="text" class="form-control" name="login" placeholder="<?php echo $Res['login'];?>" disabled ><br></td>
					</tr>
					<tr>
						<td><label for=pass>MOT DE PASSE: </label></td>
						<td><input type="password" class="form-control" name="pass" ><br></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" name="submit">Enregistrer les Modification</button></td>
					</tr>
					<tr></tr>
				</table>
			</form>
		</div>
	</div>
</body>
<?php include('footer.php'); ?> 0

</html>