

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="mesCss/bootstrap.min.css" />
    <link rel="stylesheet" href="mesCss/fichCss.css" />

</head>
<body class="container bodyConnex">
    
    <div class="bgDiv">
        <br /><br />
        <h1 class="bg-info text-center">BIENVENUE SUR VOTRE SITE DE GESTION DE TICKETS INCIDENTS</h1>
        <br />
        <h4 class="text-white " align="center">
             vous devez tout d'abord vous connectez
        </h4><br /><br />

        <div class="p-3 mb-2  text-white" align="center">
            <form method="GET" action="traiterConnexion.php" >
                <div>
                    <label class="col-sm-2 col-form-label text-white "> Nom</label>
                    <input type="text" name="login" placeholder="Entrer votre nom" />
                </div>
                <div>
                    <label class="col-sm-2 col-form-label text-white"> Mot de passe</label>
                    <input type="password" name="pass" placeholder=" mot de passe" />

                    <br /><br /><br /> <input type="submit" value="Connexion" />
                    vous n'avez pas encore de compte?
                    <a href="inscription.php" class="text-success">Inscription</a>
                </div>
            </form>

        </div>
    </div>





</body>

</html>
<?php
require_once 'footer.php';
?>