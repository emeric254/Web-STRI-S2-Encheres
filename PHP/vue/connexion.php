<?php
/* «connexion.php»
 * simple formulaire de connexion
 * 
 * vars
 * //@TODO
 * 
 */
?>
        <!-- Titre -->
        <div class="jumbotron">
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
			<form class="form-signin" action="connecte.html">
				
						
				<div class="jumbotron">
						<!-- Email -->
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									@
								</span>
								<label for="inputEmail" class="sr-only">
									Adresse Email
								</label>
								<input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
							</div>
				</div>
					
				<div class="jumbotron">
						<!-- Password -->
							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									*
								</span>
								<label for="inputPassword" class="sr-only">
									Mot de passe
								</label>
								<input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
							</div>
				</div>
						
					
					<!-- Submit -->
					<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
				
			</form>
            
        </div>
