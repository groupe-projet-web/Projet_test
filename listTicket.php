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

    //une requ�te pr�par�e n'est pas neccessaire

    $pdoStat=$maCnx->prepare('SELECT id, message, etat, reponse, date_ouvert FROM ticket where auteur =""');

    //execution de la requ�te
    $exceuteIsOk = $pdoStat->execute();
    //recuperation du r�sultat dans un tableau
    $tickets = $pdoStat->fetchAll();
    ?>