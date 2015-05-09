<?php
/* «navbar.php»
 * barre de menu sur toutes les pages du site
 * 
 * vars
 * $connecte  (represente l'etat de connexion de la personne sur le site, connectee ou non)
 * 
 * (Remi) voir si on met une constante pour indiquer le repertoire où sont les pages (style pour pas ecrire href="/vue/recherche.php')
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
                <a class="navbar-brand" href="index.html">
                    <i class="fa fa-shopping-cart"></i>
                    STRIDEAL
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav nav-pills">
                    <li>
                        <a href="/vue/recherche.php">
                            <i class="fa fa-search"></i>
                            Recherche
                        </a>
                    </li>
                    <li>
                        <a href="/vue/tendance.php">
                            <i class="fa fa-fire"></i>
                            Tendance
                        </a>
                    </li>
                    <li>
                        <a href="/vue/nouveautes.php">
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
                        <a href="/vue/inscription.php">
                            <i class="fa fa-smile-o"></i>
                            Inscription
                        </a>
                    </li>
                    <li>
                        <a href="/vue/connexion.php">
                            <i class="fa fa-sign-in"></i>
                            Connexion
                        </a>
                    </li>
<?php
} else {
?>
                    <li>
                        <a href="/vue/compte.php">
                            <i class="fa fa-user"></i>
                            Compte
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-sign-out"></i>
                            Deconnexion
                        </a>
                    </li>
<?php
}
?>
                </ul>
            </div>
          </div>
        </nav>