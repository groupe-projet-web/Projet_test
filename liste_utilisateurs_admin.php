<?php
session_start();

$connexion = new PDO("mysql:host=localhost;dbname=base_cours", "root", "root");

$texteRequete = "select login, noom, prenom,  email, droits from utilisateur";
$requete = $connexion->prepare($texteRequete);
$requete->execute();

// Récupération du résultat dans un tableau associatif
$tabUtilisateurs = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/style.css" />
    <title>Liste des utilisateurs</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<h1 class="">Liste des utilisateurs</h1>
<br><br>
<table class="table table-striped d-md-table table-bordered">
    <thead>
    <td>Login</td>
    <td>Nom</td>
    <td>Prénom</td>
    <td>Email</td>
    <td>Droits</td>
    <td>Suppression</td>
    </thead>
    <?php
    foreach ($tabUtilisateurs as $Ligne) {
        echo "<tr><td>" . $Ligne['login'] . " </td><td> " . $Ligne['droits'] . '</td><td>  <button onclick="supprimerUtil(<?=$Ligne['login']>)"> Supprimer </button> </td></tr>';
    }
    ?>
</table>
    <?php
    $maCnx=new PDO('mysql:host=localhost;dbname=test','root','root');

    ?>
</body>
</html>