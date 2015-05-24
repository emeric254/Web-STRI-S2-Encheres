<?php
/* «inscription.php»
 * formulaire d'inrcription d'un utilisateur
 *
 * //@ TODO action form a changer
 * //@ TODO faire un test sur les mots de passe pour voir si ils sont identiques
 *
 * //@ TODO pour EVOLVE vars pour re-remplissage auto si iscription foireuse
 * //@ TODO pour EVOLVE rajout drag and drop pour image
 * //@ TODO pour EVOLVE rajout choix ville par selection sur code postale
 *
 */
?>
        <!-- Titre -->
        <div class="jumbotron">
            <div class="container theme-showcase" role="main" >
                <h1>
                    <i class="fa fa-smile-o"></i>
                    Inscription
                </h1>
            </div>
        </div>

        <!-- Contenu -->
        <div class="container">

            <!-- Formulaire -->
            <form enctype="multipart/form-data" method="post" class="form-signin" action="/?page=traitementInscription" >

                <!-- Email -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Votre email
                        </h3>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                @
                            </span>
                            <label for="inputEmail" class="sr-only">
                                Adresse email
                            </label>
                            <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="email" required autofocus>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Votre mot de passe
                        </h3>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    *
                                </span>
                                <label for="inputPassword" class="sr-only">
                                    Mot de passe
                                </label>
                                <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="mot de passe" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    *
                                </span>
                                <label for="inputPasswordBis" class="sr-only">
                                    Confirmation
                                </label>
                                <input type="password" id="inputPasswordBis" class="form-control" placeholder="confirmez votre mot de passe" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row text-center" style="padding-top:10px;">
                                <div class="col-sm-5">
                                    <label class="form-label">Complexit&eacute;</label>
                                </div>
                                <div class="col-sm-7">
                                    <div id="progress-bar-container">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Nom & prénom -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Vos nom et pr&eacute;nom
                        </h3>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="fa fa-users"></i>
                                </span>
                                <label for="inputNom" class="sr-only">
                                    Nom
                                </label>
                                <input type="text"  name="inputNom" id="inputNom" class="form-control" placeholder="Nom" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="fa fa-male"></i>
                                </span>
                                <label for="inputPrenom" class="sr-only">
                                    Pr&eacute;nom
                                </label>
                                <input type="text"  name="inputPrenom" id="inputPrenom" class="form-control" placeholder="Prenom" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photo -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Votre photo de profil
                        </h3>
                        <em>optionnelle, (taille max : 2Mio)</em>
                        <div class="input-group input-group-lg" style="padding-left:1em;">
                            <label for="inputPhoto" class="sr-only">
                                Photo
                            </label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="2048" />
                            <input type="file" name="inputPhoto" id="inputPhoto" required autofocus>
                        </div>
                    </div>
                </div>

                <!-- Téléphone -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Votre numéro de t&eacute;l&eacute;phone
                        </h3>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </span>
                            <label for="inputPhone" class="sr-only">
                                T&eacute;l&eacute;phone
                            </label>
                            <input type="tel" name="inputPhone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" id="inputPhone" class="form-control" placeholder="Telephone" required autofocus>
                        </div>
                    </div>
                </div>

                <!-- Adresse -->
                <div class="well">
                    <div class="row text-center" style="margin-bottom:10px;">
                        <h3>
                            Votre adresse postale
                        </h3>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i>
                                </span>
                                <label for="inputAdresse" class="sr-only">
                                    Adresse postale
                                </label>
                                <input type="text" name="inputAdresse" id="inputAdresse" class="form-control" placeholder="Adresse Postale" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                                <label for="inputVille" class="sr-only">
                                    Code postal
                                </label>
                                <input type="number" min="0" name="inputVille" id="inputVille" class="form-control" placeholder="Code postal" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>

            </form>

        </div>
