<?php
 session_start();
require_once 'connexion.php';

if(!isset($_GET["nom"]) || !isset($_GET["prenom"]) || !isset($_GET["email"]) || !isset($_GET["pass"]) || !isset($_GET["login"]))
{
	header("location:Inscrit.php");
	exit();
}

//Ex�cution
$nom=$_GET["nom"];
$prenom=$_GET["prenom"];
$mail=$_GET["email"];
$login=$_GET["login"];
$mdp=password_hash($_GET["pass"],PASSWORD_DEFAULT);
$role="client";

// Cr�ation du texte de la requ�te
$reqtxt="select login,pass,droits from utilisateur where login=:log";

// Pr�paration
$req=$maCnx->prepare($reqtxt);
$req->bindParam(':log',$login);


$req->execute();

//R�cup�ration des donn�es dans un tableau associatif
$tabRes=$req->fetchAll(PDO::FETCH_ASSOC);


if(count($tabRes)==1)
{
echo $donnees='error';
//exit();
}
 else if(count($tabRes)==0)
{
$reqtxt1="insert into utilisateur (login, pass, nom, prenom, email, role) values (:login, :pass, :nom, :prenom, :email, :role)";

// Pr�paration
$req1=$maCnx->prepare($reqtxt1);
$req1->bindParam(':login',$login);
$req1->bindParam(':pass',$mdp);
$req1->bindParam(':nom',$nom);
$req1->bindParam(':prenom',$prenom);
$req1->bindParam(':email',$mail);
$req1->bindParam(':role',$role);

$req1->execute();

echo $donnees='ok';
header("location:index.php");
      //exit();
}

?>
