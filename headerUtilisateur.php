<meta charset="utf-8"/>
<link rel="stylesheet" type = "text/css" href="mesCss/style.css" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<header>
    <div class="bg-light" id="navbarSupportedContent">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="margin: auto; align-items: center;">
                    <li>
                        <h3>Tickets d'Incidence  |</h3>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Deposer.php">Déposer un Ticket</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="AccueilUtil.php">Mes Tickets</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-disabled="true" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="img/utilisateur.png" sizes="5x5" title=" Compte : <?php echo $_SESSION['login'];?>" >

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Mes Informations</a>
                            <a class="dropdown-item" href="AccueilUtil.php">Mes Tickets</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Deconnexion.php">Deconnexion</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
