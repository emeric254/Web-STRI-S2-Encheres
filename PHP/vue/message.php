<?php
/* «message.php»
 * page erreur sur le site
 *
 * vars
 * > $Msg    le message a afficher
 *
 */
?>
        <!-- Titre -->
        <div class="well">
            <div class="container theme-showcase" role="main" >
                <h1 class="text-center">
                    Erreur !
                </h1>
                <div class="alert alert-info" role="alert" style="margin-top:30px;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Message : </span>
                    <?php print($Msg); ?>
                </div>
            </div>
        </div>
