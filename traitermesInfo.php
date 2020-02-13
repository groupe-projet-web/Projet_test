<?php
 session_start();
require_once 'connexion.php';

if(!isset($_GET["pass"]))
{
	header("location:mesInfo.php");
	exit();
}

//Ex�cution
$login=$_GET["login"];
$mdp=password_hash($_GET["pass"],PASSWORD_DEFAULT);

// Création du texte de la requ�te
$reqtxt="select nom,prenom,email,login from utilisateur where login=:log";

// Préparation
$req=$maCnx->prepare($reqtxt);
$req->bindParam(':log',$_SESSION['login']);


$req->execute();

//R�cup�ration des donn�es dans un tableau associatif
$tabRes=$req->fetchAll(PDO::FETCH_ASSOC);


if(count($tabRes)==0)
{
echo $donnees='error';
//exit();
}
 else
 if(count($tabRes)==1)
{
$reqtxt1=" update utilisateur set pass=:pass where login=:login";

// Pr�paration
$req1=$maCnx->prepare($reqtxt1);
$req1->bindParam(':pass',$mdp);
$req1->bindParam(':login',$_SESSION['login']);


$req1->execute();

echo $donnees='ok';
header("location:AccueilUtil.php");
      //exit();
}

?>
