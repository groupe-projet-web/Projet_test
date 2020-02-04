<?php
 session_start();
require_once 'connexion.php';

if(!isset($_GET["message"]))
{
	header("location:Deposer.php");
	exit();
}

//Exécution
$message=$_GET["message"];
$etat="ouvert";
$reponse="";
$date_ouvert= date("Y-m-d H:i:s");
$auteur=$_SESSION["login"];


// Création du texte de la requête
$reqtxt="insert into ticket (message, etat, reponse, date_ouvert, auteur) values(:message, :etat, :reponse, :date_ouvert, :auteur)";

// Préparation
$req=$maCnx->prepare($reqtxt);
$req->bindParam(':message',$message);
$req->bindParam(':etat',$etat);
$req->bindParam(':reponse',$reponse);
$req->bindParam(':date_ouvert',$date_ouvert);
$req->bindParam(':auteur',$auteur);


$req->execute();


echo $donnees='ok';
header("location:Deposer.php");

      //exit();

?>
