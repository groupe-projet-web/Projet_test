<?php
    //ouverture d'une connexion

try
{
	$maCnx=new PDO('mysql:host=localhost;dbname=projet_web','root','root');

}
catch(PDOException $e)
{
 echo "Erreur PDO : ".$e->getMessage()."<br/>";
 die();

}

    //une requête préparée n'est pas neccessaire

    $pdoStat=$maCnx->prepare('SELECT id, message, etat, reponse, date_ouvert FROM ticket where auteur =""');

    //execution de la requête
    $exceuteIsOk = $pdoStat->execute();
    //recuperation du résultat dans un tableau
    $tickets = $pdoStat->fetchAll();
    ?>