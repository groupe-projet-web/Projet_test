<?php
    //ouverture d'une connexion
	session_start();
	require_once 'connexion.php';

	
    //une requête préparée n'est pas neccessaire

    $pdoStat=$maCnx->prepare('SELECT id, message, etat, reponse, date_ouvert FROM ticket where auteur =:log');

    $pdoStat->bindParam(':log',$_SESSION["login"]);
    //execution de la requête
    $pdoStat->execute();
    //recuperation du résultat dans un tableau
    $tickets = $pdoStat->fetchAll(PDO::FETCH_ASSOC);
    ?>