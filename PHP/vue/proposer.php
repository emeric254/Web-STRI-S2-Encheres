 <?php
 /* «proposer.php»
  * mise en vente d'un nouvel objet.
  *
  * // @ TODO pour EVOLVE, mettre un calendrier pour choisir la fin de l'enchere par exemple
  *
  */
?>
        <!-- Titre -->
        <div class="jumbotron">
            <div class="container theme-showcase" role="main" >
                <h1>
                    <i class="fa  fa-eur"></i>
                    Proposer une vente
                </h1>
            </div>
        </div>

        <!-- Contenu -->
        <div class="container">

            <!-- Formulaire -->
            <form enctype="multipart/form-data" method="post" class="form-signin" action="/?page=traitementNouvelleVente" >

                <!-- Titre -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Titre
                        </h3>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                            </span>
                            <label for="inputTitre" class="sr-only">
                                Adresse email
                            </label>
                            <input type="text" name="inputTitre" id="inputTitre" class="form-control" placeholder="Titre" required autofocus>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Description
                        </h3>
                        <div class="input-group input-group-lg" style="display: block;">
                            <textarea rows="8" maxlength="4000" style=" resize:none; width:100%; padding: 4px; " id="inputDescription"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Durée -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Durée
                        </h3>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                Jours
                            </span>

                            <input type="number" id="inputDureeJour" min="0" value="1" class="form-control" required>
                        </div>

                        <p></p>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                Heures
                            </span>

                            <input type="number" id="inputDureeHeure" min="0" value="0" class="form-control" required>
                        </div>

                        <p></p>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                Minutes
                            </span>

                            <input type="number" id="inputDureeMinute" min="0" value="0" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Prix de départ -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Prix de départ
                        </h3>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="fa fa-eur"></i>
                            </span>

                            <input type="number" id="inputPrix" min="1" value="1" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Pas d'enchere -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Pas minimal d'enchére
                        </h3>

                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="fa fa-eur"></i>
                            </span>

                            <input type="number" id="inputPas" min="1" value="1" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Proposer</button>

            </form>

        </div>
