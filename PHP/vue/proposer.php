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
                <h2>
                    <i class="fa  fa-eur"></i>
                    Proposer une vente
                </h2>
            </div>
        </div>

        <!-- Contenu -->
        <div class="container">

            <!-- Formulaire -->
            <form enctype="multipart/form-data" method="post" class="form-signin" action="/?page=traitementProposer" >

                <!-- Titre -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h4>
                            Titre
                        </h4>
                        <div class="input-group input-group">
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
                        <h4>
                            Description
                        </h4>
                        <div class="input-group input-group" style="display: block;">
                            <textarea rows="8" maxlength="4000" style=" resize:none; width:100%; padding: 4px; " name="inputDescription" id="inputDescription"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Durée -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h4>
                            Dur&eacute;e
                        </h4>

                        <div class="input-group input-group">
                            <span class="input-group-addon">
                                Jours
                            </span>

                            <input type="number" name="inputDureeJour" id="inputDureeJour" min="0" value="1" class="form-control" required>
                        </div>

                        <p></p>

                        <div class="input-group input-group">
                            <span class="input-group-addon">
                                Heures
                            </span>

                            <input type="number" name="inputDureeHeure" id="inputDureeHeure" min="0" value="0" class="form-control" required>
                        </div>

                        <p></p>

                        <div class="input-group input-group">
                            <span class="input-group-addon">
                                Minutes
                            </span>

                            <input type="number" name="inputDureeMinute" id="inputDureeMinute" min="0" value="0" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Prix de départ -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h4>
                            Prix de d&eacute;part
                        </h4>

                        <div class="input-group input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-eur"></i>
                            </span>

                            <input type="number" name="inputPrix" id="inputPrix" min="1" value="1" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Pas d'enchere -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h4>
                            Pas minimal d'ench&egrave;re
                        </h4>

                        <div class="input-group input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-eur"></i>
                            </span>

                            <input type="number" name="inputPas" id="inputPas" min="1" value="1" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Proposer</button>

            </form>

        </div>