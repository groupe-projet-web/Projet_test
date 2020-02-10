<?php
session_start();
$connexion = new PDO("mysql:host=localhost;dbname=projet_web", "root", "root");
$texteRequete = "select login, nom, prenom,  email, role from projet_web.utilisateur order by nom";
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>

</head>

<?php include('headerAdmin.php')?>

<body>
<h1 class="modal-title" style="text-align: center;">Liste des utilisateurs</h1>
<br>
<table id="tabUtils" class="table table-striped d-md-table table-bordered">
    <thead class="bg-secondary">
    <th>Login</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Email</th>
    <th>Role</th>
    <th>Suppression</th>
    </thead>
    <?php
    foreach ($tabUtilisateurs as $Ligne) {

        ?>
        <tr>
            <td><?=$Ligne['login']?>  </td>
            <td><?=$Ligne['nom']?> </td>
            <td><?=$Ligne['prenom']?> </td>
            <td><?=$Ligne['email']?> </td>
            <td><?=$Ligne['role']?> </td>
            <td>  Supprimer </button> </td>
        </tr>
        <?php
    }
    ?>
</table>

<script language="javascript" type="text/javascript">
    var tabUtilsfiltre = {
        title: "Filtrer par :",
        col_0: "none",
        col_1: "select",
        col_2: "none",
        col_3: "none",
        col_4: "select",
        col_5: "none",
        display_all_text: "Afficher tout",
        sort_select: true,
        enter_key: false,
        on_change: false,
        reset: true,
        btn: true
    };
    var tf01 = setFilterGrid("tabUtils", tabUtilsfiltre);

    //var tf01 = setFilterGrid("tabTickets",tabTicketsfiltre);
</script>
</body>



</html>
