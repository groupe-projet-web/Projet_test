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
<?php include('headerAdmin.php')?>
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
				  <td style="text-align:center"> <button class='btn btn-warning' data-toggle="modal" data-target="#exampleModal" >Cloturer</button></td>
                 </tr>
    
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Entrer Votre Reponse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form> 
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<?php
    }
    ?> 

</table>
</div>

<script>
function traiteTicket(idTic)
{   
       $.get("traiterTic.php",{id:idTic},traiterRepTrait);
	   
}

function traiterRepTrait(donnees)
{
	location.assign(location.href);
}

function clotureTicket(idTic)
{
       $.get("cloturerTic.php",{id:idTic},traiterRepClot);
}
function traiterRepClot(donnees)
{
	location.assign(location.href);
}
</script>

</body>
<?php include('footer.php'); ?>
</html>
 
                        
