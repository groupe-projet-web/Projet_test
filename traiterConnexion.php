<?php
session_start();
require_once 'connexion.php';

if(!isset($_GET["login"]) || !isset($_GET["pass"]))
{
	header("location:index.php");
	exit();
}

//Exécution
$login=$_GET["login"];
$mdp=$_GET["pass"];

// Création du texte de la requête
$reqtxt="select pass,droits from utilisateur where login=:log and pass=:mdp";

// Préparation
$req=$maCnx->prepare($reqtxt);
$req->bindParam(':log',$login);
$req->bindParam(':mdp',$mdp);

//Exécution
$login=$_GET["login"];
$mdp=$_GET["pass"];

$req->execute();

//Récupération des données dans un tableau associatif
$tabRes=$req->fetchAll(PDO::FETCH_ASSOC);



if(count($tabRes)==1)
{
$_SESSION["login"]=$_GET["login"];

$Res1=$tabRes[0];
$_SESSION["droits"]=$Res1["droits"];
if($Res1["droits"]=="administrateur")
{
header('location:accueil2.php');
exit();
}
else if($Res1["droits"]=="utilisateur")
{
header('location:accueilUTI.php');
exit();
}else {
	echo "rien";
}

}
else {
	 header("location:index.php?message=erreur d'identification");
      exit();
}


