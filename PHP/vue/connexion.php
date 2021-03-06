<?php
/* «connexion.php»
 * simple formulaire de connexion
 *
 * //@TODO  action du form a changer
 *
 * inputs :
 *  > inputEmail
 *  > inputPassword
 *
 */
?>
        <!-- Titre -->
        <div class="well">
            <div class="container theme-showcase" role="main" >
                <h1>
                    <i class="fa fa-sign-in"></i>
                    Connexion
                </h1>
            </div>
        </div>

        <!-- Contenu -->
        <div class="container">

            <!-- Formulaire -->
            <form class="form-signin" action="/?page=traitementConnexion" method="POST">

                <div class="well">
                    <!-- Email -->
                    <div class="input-group">
                        <span class="input-group-addon">
                            @
                        </span>
                        <label for="inputEmail" class="sr-only">
                            Adresse Email
                        </label>
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
                    </div>
                </div>

                <div class="well">
                    <!-- Password -->
                    <div class="input-group">
                        <span class="input-group-addon">
                            *
                        </span>
                        <label for="inputPassword" class="sr-only">
                            Mot de passe
                        </label>
                        <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Mot de passe" required>
                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>

            </form>

        </div>
