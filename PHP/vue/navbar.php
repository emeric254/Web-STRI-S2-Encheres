<?php
/* «navbar.php»
 * barre de menu sur toutes les pages du site
 * 
 * vars
 * $connecte  (represente l'etat de connexion de la personne sur le site, connectee ou non)
 * 
 */
?>
        <!-- barre de menu -->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> <!-- @TODO a changer par un lien du type index.php -->
                    <i class="fa fa-shopping-cart"></i>
                    STRIDEAL
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav nav-pills">
                    <li>
                        <a href="/vue/recherche.php"> <!-- @TODO a changer par un lien du type index.php?page=recherche -->
                            <i class="fa fa-search"></i>
                            Recherche
                        </a>
                    </li>
                    <li>
                        <a href="/vue/tendance.php"> <!-- @TODO a changer par un lien du type index.php?page=tendance -->
                            <i class="fa fa-fire"></i>
                            Tendance
                        </a>
                    </li>
                    <li>
                        <a href="/vue/nouveautes.php"> <!-- @TODO a changer par un lien du type index.php?page=nouveautes -->
                            <i class="fa fa-newspaper-o"></i>
                            Nouveautes
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-form navbar-right nav-pills">
<?php
if($connecte)
{
?>
                    <li>
                        <a href="/vue/compte.php"> <!-- @TODO a changer par un lien du type index.php?page=compte -->
                            <i class="fa fa-user"></i>
                            Compte
                        </a>
                    </li>
                    <li>
                        <a href="index.php"> <!-- @TODO a changer par un lien du type index.php?page=deconnexion -->
                            <i class="fa fa-sign-out"></i>
                            Deconnexion
                        </a>
                    </li>
<?php
} else {
?>
                    <li>
                        <a href="/vue/inscription.php"> <!-- @TODO a changer par un lien du type index.php?page=inscription -->
                            <i class="fa fa-smile-o"></i>
                            Inscription
                        </a>
                    </li>
                    <li>
                        <a href="/vue/connexion.php"> <!-- @TODO a changer par un lien du type index.php?page=connexion -->
                            <i class="fa fa-sign-in"></i>
                            Connexion
                        </a>
                    </li>
<?php
}
?>
                </ul>
            </div>
          </div>
        </nav>
