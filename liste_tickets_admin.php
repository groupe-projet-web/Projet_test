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

<table class="table table-striped d-md-table table-bordered">
    <thead>
    <td title="id">Id <input type="submit" class="button" name="insert" value="insert" /></td>
    <td title="">Message <input type="submit" class="button" name="insert" value="insert" /></td>
    <td>Auteur <input type="submit" class="button" name="insert" value="insert" /></td>
    <td>Etat <img src="img\download.png"></td>
    <td>Reponse <img src="img\download.png"></td>
    <td>Date d'ouverture <img src="img\download.png"></td>
    <td>Etat <img src="img\download.png"></td>
    <td>Supprimer</td>
    </thead>
    <?php
    foreach ($tabUtilisateurs as $Ligne) {
        echo "<tr><td>" . $Ligne['id'] . " </td>
                  <td>" . $Ligne['message'] . " </td>
                  <td>" . $Ligne['auteur'] . " </td>
                  <td>" . $Ligne['etat'] . " </td>
                  <td>" . $Ligne['reponse'] . " </td>
                  <td>" . $Ligne['date_ouvert'] . " </td>
                  <td> " . $Ligne['etat'] . '</td>
                  <td>  Supprimer </button> </td></tr>';
    }
    ?>
</table>
</body>
</html>
