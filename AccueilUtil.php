﻿<?php
require_once('listTicket.php');

if(!isset($_SESSION["role"]))
{
    die("<strong>Accès resevé aux personnes enregistés</strong>");
}
if($_SESSION["role"]!="client")
{
    die("<strong>Vous n'etes pas un Utilisateur</strong>");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/Web_Mini_Projet/mesCss/style.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="mesCss/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src ="js/bootbox.min.js"> </script>

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <title>Mes Tickets</title>

</head>


<body class=container>
<?php include('headerutilisateur.php'); ?>
<div class="container clearfix">
    <h1 class="bg-info text-center">Liste des Tickets</h1>


    <div center style="overflow-x:auto; ">
        <table bgcolor="#deb887" class ="table table-striped d-md-table table-bordered flex-column">
            <tr>
                <th>Message </th>
                <th>État</th>
                <th>Réponse</th>
                <th>Date de l'ouverture</th>
                <th style="text-align:center">Annuler</th>
            </tr>
            <?php foreach ($tickets as $ticket): ?>
                <tr id="<?=$ticket['id']?>">

                    <td aria-expanded="true"><?= $ticket['message'].' ' ?></td>
                    <td><?= $ticket['etat'].' '?></td>
                    <td><?= $ticket['reponse'].' '?></td>
                    <td><?= $ticket['date_ouvert'].' '?></td>
                    <td style="text-align:center"> <button class='btn btn-danger' onclick="supTicket('<?=$ticket['id']?>')">Annuler</button></td>

                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>

<script>
    function supTicket(idTic)
    {

        bootbox.confirm({
            message: "Voulez vous vraiment annuler cette procédure?",
            buttons: {
                confirm: {
                    label: 'Oui',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Non',
                    className: 'btn-danger'
                }
            },
            callback: function (result){
                if (result)
                {
                    $.get("supprimerTic.php",{id:idTic},traiterRepSup);
                }
            }
        });


    }

    function traiterRepSup(donnees)
    {

    }
</script>

</body>
<?php include('footer.php'); ?>
</html>
