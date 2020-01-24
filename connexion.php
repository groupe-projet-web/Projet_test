<?php

try
{
	$maCnx=new PDO('mysql:host=localhost;dbname=test','root','root');

}
catch(PDOException $e)
{
 echo "Erreur PDO : ".$e->getMessage()."<br/>";
 die();

}


