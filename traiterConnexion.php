<?php
session_start();
require_once 'connexion.php';

if(!isset($_GET["login"]) || !isset($_GET["pass"]))
{
	header("location:index.php");
	exit();
}


// Création du texte de la requête
$reqtxt="select pass,role from utilisateur where login=:log";

// Préparation
$req=$maCnx->prepare($reqtxt);
$req->bindParam(':log',$login);


//Exécution
$login=$_GET["login"];
$mdp=$_GET["pass"];

$req->execute();

//Récupération des données dans un tableau associatif
$tabRes=$req->fetchAll(PDO::FETCH_ASSOC);

var_dump($tabRes);


if(count($tabRes)==1)
{
 $Res1=$tabRes[0];

 if (password_verify($_GET["pass"],$Res1["pass"]))
 {
  $_SESSION["login"]=$_GET["login"];
  $_SESSION["role"]=$Res1["role"];

  if($Res1["role"]=="admin")
   {
    header('location:liste_utilisateurs_admin.php');
    exit();
   }
  else if($Res1["role"]=="client")
   {
    header('location:AccueilUtil.php');
    exit();
   }
 } # fin if verify
 else {
 	header("location:index.php?message=erreur verification");
    exit();
 }
} # fin if count
else {
	 header("location:index.php?message=erreur d'identification");
      exit();
}


