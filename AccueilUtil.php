<?php
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
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Mes Tickets</title>
 
</head>

    
<body>
<?php include('headerutilisateur.php'); ?>
    <div class="container">  
            <h1 class="bg-info text-center">Liste des Tickets</h1>
            
     
            <div center>
                <table class ="table">
                    <tr>
                        <th>id	</th>
                        <th>message </th>
                        <th>etat</th>
                        <th>reponse</th>
                        <th>date_ouvert</th>
                    </tr>
                    <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?= $ticket['id'].' '?></td>
                        <td><?= $ticket['message'].' ' ?></td>
                        <td><?= $ticket['etat'].' '?></td>
                        <td><?= $ticket['reponse'].' '?></td>
                        <td><?= $ticket['date_ouvert'].' '?></td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
    </div>
    
</body>
<?php include('footer.php'); ?>
</html>
