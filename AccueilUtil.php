
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/Web_Mini_Projet/style.css" />
    <title>Le Foyer</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Nos Menus</title>
    <!--Made with love by Mutiullah Samim -->
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style type="text/css">
    </style>

    
<body>
<?php include('headerutilisateur.php'); ?>
    <div class="container">  
            <h1 class="bg-info text-center">Liste des Tickets</h1>
            <?php 
            require_once('listTicket.php');
            ?>
     
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
    <script>
    function suppUtil(logUtil)
    {
    // Suppression brutale sans confirmation
    $.get("supprimerUtil.php",{login:logUtil},traiterRepSup);
	}
    
    function traiterRepSup(donnees)
    {
     if (donnees!="----erreur----")
     {
     $("tr").filter(":contains("+donnees+")").remove();
	 }
	}
    </script>

</body>
<?php include('footer.php'); ?>
</html>
