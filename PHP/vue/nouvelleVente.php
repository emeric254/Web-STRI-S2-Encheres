 <?php
 /* nouvelleVente.php»
  * formulaire de mise en vente d'un nouvel objet.
  *
  *
  * TODO :
  * - Mettre le bon logo devant le titre.
  * - pour tous les champs, voir quoi mettre comme label.
  *
  *
  */
?>
        <!-- Titre -->
        <div class="jumbotron">
            <div class="container theme-showcase" role="main" >
                <h1>
                    <i class="fa  fa-eur"></i>
                    Mettre en vente
                </h1>
            </div>
        </div>
        
        <!-- Contenu -->
        <div class="container">
        
            <!-- Formulaire -->
            <form enctype="multipart/form-data" method="post" class="form-signin" action="/?page=traitementNouvelleVente" >
                
                
                <div class="well">
                    <!-- Titre de l'annonce -->
                    <div class="row text-center" style="margin-bottom:10px;">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                Titre
                            </span>
                            <label for="inputTitre" class="sr-only">
                                titre
                            </label>
                            <input type="email" name="inputTitre" id="inputTitre" class="form-control" placeholder="Saisir le titre de l'annonce" required autofocus>
                        </div>
                    </div>
                    
                    <!-- Description de l'annonce -->
                    <div class="row text-center" style="margin-bottom:10px;">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                Description
                            </span>
                            <label for="inputDescription" class="sr-only">
                                description
                            </label>
                            <input type="text" name="inputEmail" id="inputEmail" class="form-control" placeholder="Saisir le titre de l'annonce" required autofocus> 
                        </div>
                    </div>
                </div>
                
        </div>