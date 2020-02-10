<?php
session_start();
require_once 'connexion.php';

 $id=$_GET["id"];
 $reponse=$_GET["reponse"];
 $etat="encours";


// Cr�ation du texte de la requ�te
$reqtxt="select id,etat from ticket where id=:id and etat=:etat";

// Pr�paration
$req=$maCnx->prepare($reqtxt);
$req->bindParam(":id",$id);
$req->bindParam(":etat",$etat);
$req->execute();

//R�cup�ration des donn�es dans un tableau associatif
$tabRes=$req->fetchAll(PDO::FETCH_ASSOC);
var_dump($tabRes);
$etat="cloturé";

if(count($tabRes)==1)
{
$reqtxt1=" update ticket set etat=:etat,reponse=:reponse  where id=:id";

$req1=$maCnx->prepare($reqtxt1);
$req1->bindParam(":id",$id);
$req1->bindParam(":etat",$etat);
$req1->bindParam(":reponse",$reponse);

$req1->execute();

//header("location:liste_tickets_admin.php");

//exit();
}
 else if(count($tabRes)==0)
{
echo $donnees="non";
      
}

?>