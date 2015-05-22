<?php
/* «erreur.php»
 * page erreur sur le site
 * 
 * vars
 * > $errMsg	message d'erreur
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
					<span class="sr-only">Error:</span>
					<?php print $errMsg; ?>
				</div>
            </div>
        </div>
