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
    <link rel="stylesheet" type="text/css" href="mesCss/style.css"/>
    <title>Liste des utilisateurs</title>

    <link href="mesCss/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>

</head>

<?php include('headerAdmin.php') ?>
<body>
<br><br><br>
<div>
    <h1 class="text-wrap text-center">Liste des Tickets</h1>
</div>
<br><br>
<div style="overflow-x:auto;">
    <table bgcolor="#f5f5dc" id="tabTickets" cellspacing="0" class="table d-md-table table-bordered flex-column">
        <!-- Control buttons -->

        <thead class="bg-secondary text-white text-center">
        <td title="">Message</td>
        <td>Auteur </td>
        <td>État </td>
        <td>Réponse </td>
        <td>Date d'ouverture </td>
        <td>Début de traitement </td>
        <td>géré par </td>
        <td>Traiter</td>
        <td>Clôturer</td>

        </thead>

        <?php
        foreach ($tabUtilisateurs as $Ligne) {
            ?>
            <tr id="<?= $Ligne['id'] ?>">
                <td><?= $Ligne['message'] ?> </td>
                <td><?= $Ligne['auteur'] ?> </td>
                <td><?= $Ligne['etat'] ?> </td>
                <td><?= $Ligne['reponse'] ?> </td>
                <td><?= $Ligne['date_ouvert'] ?></td>
                <td><?= $Ligne['date_debut_traitement'] ?></td>
                <td><?= $Ligne['gestionnaire'] ?></td>
                <td style="text-align:center">
                    <button class='btn btn-info' onclick="traiteTicket('<?= $Ligne['id'] ?>')">Traiter</button>
                </td>
                <td style="text-align:center">
                    <button class='btn btn-warning' data-toggle="modal" data-target="#exampleModal">Cloturer</button>
                </td>
            </tr>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
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
    function traiteTicket(idTic) {
        $.get("traiterTic.php", {id: idTic}, traiterRepTrait);
    }

    function traiterRepTrait(donnees) {
        location.assign(location.href);
    }

    function clotureTicket(idTic) {
        $.get("cloturerTic.php", {id: idTic}, traiterRepClot);
    }

    function traiterRepClot(donnees) {
        location.assign(location.href);
    }
</script>

</body>
<script language="javascript" type="text/javascript">
    var tabTicketsfiltre = {
        title: "Filtrer par :",
        col_0: "none",
        col_1: "select",
        col_2: "select",
        col_3: "none",
        col_4: "none",
        col_5: "none",
        col_6: "select",
        col_7: "none",
        col_8: "none",
        display_all_text: "Afficher tout",
        sort_select: true,
        enter_key: false,
        on_change: false,
        reset: true,
        btn: true
    };
    var tf10 = setFilterGrid("tabTickets", tabTicketsfiltre);

    //var tf01 = setFilterGrid("tabTickets",tabTicketsfiltre);
</script>

<?php include('footer.php'); ?>
</html>
 
                        
