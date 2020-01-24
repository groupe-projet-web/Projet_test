<?php
session_start();
require_once 'connexion.php';

if(!isset($_GET["login"]) || !isset($_GET["pass"]))
{
	header("location:index.php");
	exit();
}

//Ex�cution
$login=$_GET["login"];
$mdp=$_GET["pass"];

// Cr�ation du texte de la requ�te
$reqtxt="select pass,droits from utilisateur where login=:log and pass=:mdp";

// Pr�paration
$req=$maCnx->prepare($reqtxt);
$req->bindParam(':log',$login);
$req->bindParam(':mdp',$mdp);

//Ex�cution
$login=$_GET["login"];
$mdp=$_GET["pass"];

$req->execute();

//R�cup�ration des donn�es dans un tableau associatif
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


