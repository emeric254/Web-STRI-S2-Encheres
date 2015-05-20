<?php
/* «inscription.php»
 * formulaire d'inrcription d'un utilisateur
 * 
 * //@TODO vars si iscription foireuse ?
 * //@TODO action form a changer
 * //@TODO rajout drag and drop pour image
 * //@TODO faire un test sur les mots de passe pour voir si ils sont identiques
 * //@TODO Preciser l'adresse car on sait pas forcément quoi y écrire
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
			<form class="form-signin" action="core/traitementInscription.php">
				<div class="jumbotron">
					<div class="row" style="margin-top:10px; margin-bottom:20px;">
						<h3>
							Votre Email
						</h3>
						<div class="input-group input-group-lg">
							<span class="input-group-addon">
								@
							</span>
							<label for="inputEmail" class="sr-only">
								Adresse Email
							</label>
							<input type="email" id="inputEmail" class="form-control" placeholder="email" required autofocus>
						</div>
					</div>
				</div>
				<div class="jumbotron">
					<div class="row" style="margin-top:10px; margin-bottom:20px;">
						<h3>
							Votre Mot de passe
						</h3>
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									*
								</span>
								<label for="inputPassword" class="sr-only">
									Mot de passe
								</label>
								<input type="password" id="inputPassword" class="form-control" placeholder="mot de passe" required>
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
							<div class="row">
								<div class="col-sm-5">
									<label class="form-label">Complexité</label>
								</div>
								<div class="col-sm-7">
									<div id="progress-bar-container">
											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="jumbotron">
					<div class="row" style="margin-top:10px; margin-bottom:20px;">
						<h3>
							Votre nom
						</h3>
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<i class="fa fa-users"></i>
								</span>
								<label for="inputNom" class="sr-only">
									Nom
								</label>
								<input type="text" id="inputNom" class="form-control" placeholder="Nom" required autofocus>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<i class="fa fa-male"></i>
								</span>
								<label for="inputPrenom" class="sr-only">
									Prenom
								</label>
								<input type="text" id="inputPrenom" class="form-control" placeholder="Prenom" required autofocus>
							</div>
						</div>
					</div>
				</div>
				<div class="jumbotron">
					<div class="row" style="margin-top:10px; margin-bottom:20px;">
						<h3>
							Votre photo
						</h3>
						<div class="input-group input-group-lg">
							<label for="inputPhoto" class="sr-only">
								Photo
							</label>
							<input type="file" id="inputPhoto" required autofocus>
						</div>
					</div>
				</div>
				<div class="jumbotron">
					<div class="row" style="margin-top:10px; margin-bottom:20px;">
						<h3>
							Votre téléphone
						</h3>
						<div class="input-group input-group-lg">
							<span class="input-group-addon">
								<i class="fa fa-phone"></i>
							</span>
							<label for="inputPhone" class="sr-only">
								Telephone
							</label>
							<input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" id="inputPhone" class="form-control" placeholder="Telephone" required autofocus>
						</div>
					</div>
				</div>
				<div class="jumbotron">
					<div class="row" style="margin-top:10px; margin-bottom:20px;">
						<h3>
							Votre adresse
						</h3>
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<i class="fa fa-envelope-o"></i>
								</span>
								<label for="inputAdresse" class="sr-only">
									Adresse Postale
								</label>
								<input type="text" id="inputAdresse" class="form-control" placeholder="Adresse Postale" required autofocus>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<i class="fa fa-map-marker"></i>
								</span>
								<label for="inputVille" class="sr-only">
									Ville
								</label>
								<input type="text" id="inputVille" class="form-control" placeholder="Ville" required autofocus>
							</div>
						</div>
					</div>
				</div>
				<!-- Submit -->
				<button class="btn btn-lg btn-primary btn-block" type="submit">Inscription</button>
			</form>
        </div>
