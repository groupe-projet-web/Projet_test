<?php
session_start();
$connexion = new PDO("mysql:host=localhost;dbname=projet_web", "root", "root");
$texteRequete = "select id, message, etat,  reponse, date_ouvert, auteur from projet_web.ticket";
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<?php include('headerUtilisateur.php')?>
<body>
<h1 class="">Liste des tickets</h1>
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
    <thead>
    <td title="">Message </td>
    <td>Auteur <img src="img\download.png"></td>
    <td>Etat <img src="img\download.png"></td>
    <td>Reponse <img src="img\download.png"></td>
    <td>Date d ouverture <img src="img\download.png"></td>
    <td>Etat <img src="img\download.png"></td>

    </thead>
    <?php
    foreach ($tabUtilisateurs as $Ligne) {
        echo "<tr><td>" . $Ligne['message'] . " </td>
                  <td>" . $Ligne['auteur'] . " </td>
                  <td>" . $Ligne['etat'] . " </td>
                  <td>" . $Ligne['reponse'] . " </td>
                  <td>" . $Ligne['date_ouvert'] . " </td>
                  <td> " . $Ligne['etat'] . "</td>
                  </tr>";
    }
    ?>
</table>
</div>
</body>
</html>
