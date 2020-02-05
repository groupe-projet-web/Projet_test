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
    <div id="myBtnContainer" class="radio">
        <h4 class="d-inline">Filtrer par : </h4>
        <input name="filtreByEtat" checked type="radio" class="radio-inline" onclick="filterSelection('all')"> Afficher tout</input>
        <input name="filtreByEtat" type="radio" class="radio-inline" onclick="filterByEtat('ouvert')"> Ouverts</button>
        <input name="filtreByEtat" type="radio" class="radio-inline" onclick="filterByEtat('fermé')"> Fermés</button>
        <input name="filtreByEtat" type="radio" class="radio-inline" onclick="filterByEtat('annulé')"> Annulés</button>
    </div>
    <br>
    <thead class="bg-dark text-white">
    <th title="">Message </th>
    <th>Auteur <img src="img\download.png"></th>
    <th>Etat <img src="img\download.png"></th>
    <th>Reponse <img src="img\download.png"></th>
    <th>Date d'ouverture <img src="img\download.png"></th>
    <th>Etat <img src="img\download.png"></th>
    <th>Supprimer</th>
    </thead>
    <?php
    foreach ($tabUtilisateurs as $Ligne) {
        $Ligne['auteur'] = $auteur;
        $Ligne['etat'] = $etat;

        echo "<tr data-etat=$etat><td>" . $Ligne['message'] . " </td>
                  <td>" . $Ligne['auteur'] . " </td>
                  <td>" . $Ligne['etat'] . " </td>
                  <td>" . $Ligne['reponse'] . " </td>
                  <td>" . $Ligne['date_ouvert'] . " </td>
                  <td> " . $Ligne['etat'] . '</td>
                  <td>  Supprimer </button> </td></tr>';
    }
    ?>
</table>
</div>
</body>
</html>
