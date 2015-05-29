<?php
/* «navbar.php»
 * barre de menu sur toutes les pages du site
 *
 * vars
 *  > $connecte  (represente l'etat de connexion de la personne sur le site, connectee ou non)
 *  > $isadmin  (booleen pour la gestion admin, user courant == admin ?)
 */
?>
        <!-- barre de menu -->
        <nav class="navbar navbar-default navbar-fixed-top">
<!--
          <div class="container">
-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <i class="fa fa-shopping-cart"></i>
                    STRIDEAL
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav nav-pills">
                    <li>
                        <a href="/?page=recherche">
                            <i class="fa fa-search"></i>
                            Recherche
                        </a>
                    </li>
<!--
                    <li>
                        <a href="/?page=tendance">
                            <i class="fa fa-fire"></i>
                            Tendance
                        </a>
                    </li>
-->
                    <li>
                        <a href="/?page=nouveautes">
                            <i class="fa fa-newspaper-o"></i>
                            Nouveautes
                        </a>
                    </li>

<?php
//~ if($connecte)
//~ {
?>
                    <li>
                        <a href="/?page=proposer">
                            <i class="fa fa-share"></i>
                            Vendre
                        </a>
                    </li>
<?php
//~ }
?>
                </ul>
                <ul class="nav navbar-form navbar-right nav-pills">
<?php
if($connecte)
{
    if($isadmin)
    {
?>
                    <li>
                        <a href="/?page=admin">
                            <i class="fa fa-cogs"></i>
                            Gestion
                        </a>
                    </li>
<?php
    }
?>

                    <li>
                        <a href="/?page=compte">
                            <i class="fa fa-user"></i>
                            Compte
                        </a>
                    </li>
                    <li>
                        <a href="/?page=deconnexion">
                            <i class="fa fa-sign-out"></i>
                            Deconnexion
                        </a>
                    </li>
<?php
} else {
?>
                    <li>
                        <a href="/?page=inscription">
                            <i class="fa fa-smile-o"></i>
                            Inscription
                        </a>
                    </li>
                    <li>
                        <a href="/?page=connexion">
                            <i class="fa fa-sign-in"></i>
                            Connexion
                        </a>
                    </li>
<?php
}
?>
                </ul>
            </div>
<!--
          </div>
-->
        </nav>
