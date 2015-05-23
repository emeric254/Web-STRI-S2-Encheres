<?php
/* «erreur.php»
 * page erreur sur le site
 *
 * vars
 * > $errMsg    le message d'erreur a afficher
 *
 */
?>
        <!-- Titre -->
        <div class="jumbotron">
            <div class="container theme-showcase" role="main" >
                <h1 class="text-center">
                    Erreur !
                </h1>
                <div class="alert alert-danger" role="alert" style="margin-top:30px;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Message d'erreur : </span>
                    <?php print($errMsg); ?>
                </div>
            </div>
        </div>
