<?php
session_start();
$connexion = new PDO("mysql:host=localhost;dbname=projet_web", "root", "root");
$texteRequete = "select id, message, etat,  reponse, date_ouvert,date_debut_traitement,gestionnaire, auteur from projet_web.ticket";
$requete = $connexion->prepare($texteRequete);
$requete->execute();

// Récupération du résultat dans un tableau associatif
$tabUtilisateurs = $requete->fetchAll(PDO::FETCH_ASSOC);

//var_dump($tabUtilisateurs);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="mesCss/style.css" />
    <title>Liste des utilisateurs</title>
  
	<link href="mesCss/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<?php include('headerUtilisateur.php')?>
<body>
<br><br><br>
<h1 class="bg-info text-center">Liste des Tickets</h1>
<br><br>
<div style="overflow-x:auto;">
<table bgcolor="#f5f5dc" class="table d-md-table table-bordered flex-column">
    <!-- Control buttons -->
    <div id="myBtnContainer">
        <button class="btn active" onclick="filterSelection('all')"> Afficher tout</button>
        <button class="btn" onclick="filterSelection('cars')"> Ouverts</button>
        <button class="btn" onclick="filterSelection('animals')"> Fermés</button>
        <button class="btn" onclick="filterSelection('fruits')"> Annulés</button>
    </div>
    <thead class="bg-secondary text-center">
    <td title="">Message </td>
    <td>Auteur <img src="img\download.png"></td>
    <td>Etat <img src="img\download.png"></td>
    <td>Reponse <img src="img\download.png"></td>
    <td>Date d ouverture <img src="img\download.png"></td>
	<td>Debut de Traitetemnt <img src="img\download.png"></td>
    <td>Gérer Par <img src="img\download.png"></td>
	<td>Traiter </td>
	<td>Cloturer </td>

    </thead>

    <?php
    foreach ($tabUtilisateurs as $Ligne) {
	?>
                 <tr id="<?=$Ligne['id']?>">
		          <td><?=$Ligne['message'] ?> </td>
                  <td><?= $Ligne['auteur'] ?> </td>
                  <td><?= $Ligne['etat'] ?> </td>
                  <td><?= $Ligne['reponse'] ?> </td>
                  <td><?= $Ligne['date_ouvert'] ?></td>
				  <td><?= $Ligne['date_debut_traitement'] ?></td>
				  <td><?= $Ligne['gestionnaire'] ?></td>
				  <td style="text-align:center"> <button class='btn btn-info' onclick="traiteTicket('<?=$Ligne['id']?>')">Traiter</button></td>
				  <td style="text-align:center"> <button class='btn btn-warning' onclick="traiteTicket('<?=$Ligne['id']?>')">Cloturer</button></td>
                 </tr>
    <?php
    }
    ?>
</table>
</div>

<script>
function traiteTicket(idTic)
{
      console.log("debut");
       $.get("traiterTic.php",{id:idTic},traiterRepTrait);
	   
	  //console.log("fin");
}

function traiterRepTrait(donnees)
{
	//console.log(donnees);
	location.assign(location.href);
}
</script>

</body>
<?php include('footer.php'); ?>
</html>
 
                        
