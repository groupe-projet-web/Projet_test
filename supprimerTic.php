<?php   
    require_once "connexion.php";

    $id = $_GET["id"];
	$etat="ouvert";

    $req= $maCnx->prepare("delete from ticket where id=:id and etat=:etat");
    $req->bindParam(":id",$id);
	$req->bindParam(":etat",$etat);

    $req->execute();
	// https://blog.rolandl.fr/907-une-fenetre-de-confirmation-a-la-suppression-des-lignes-de-vos-tableaux-avec-jquery
	// https://openclassrooms.com/forum/sujet/jquery-confirmation-de-suppression-23842
    echo $id;