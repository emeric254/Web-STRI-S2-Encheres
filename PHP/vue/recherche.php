<?php
     
?>   
        <!-- Titre -->
        <div class="jumbotron">
            <div class="container theme-showcase" role="main" >
                <h1>
					<i class="fa fa-search"></i>
					Recherche
                </h1>
            </div>
        </div>
        
        <!-- Contenu -->
        <div class="container">

<?php
//if     
?>

			<!-- Formulaire -->
			<form class="form" action="resultat.html">
				
				<div class="jumbotron">
					
					<ul class="nav nav-pills nav-justified">
						
						<li class="active">											
							<a href="recherche-vente.html">
								<i class="fa fa-search"></i>
								&nbsp;
								Vente
							</a>
						</li>
						
						<li>
						</li>
						
						<li class="active">						
							<a href="recherche-user.html">
								<i class="fa fa-search"></i>
								&nbsp;
								Utilisateur
							</a>	
						</li>
						
					</ul>
				</div>
			</form>

<?php
//else     
?>
<?php
	//if     
?>
			<!-- Formulaire -->
			<form class="form" action="resultatRechercheProfil.html">
				<div class="jumbotron">
					<div class="row" style="margin-top:10px; margin-bottom:20px;">
						<!-- Mot Clef -->
						<div class="col-sm-9">
							<div class="input-group input-group-md">
								<span class="input-group-addon">
									<i class="fa fa-search"></i>
								</span>
								<label for="inputUser" class="sr-only">
									Utilisateur
								</label>
								<input type="search" id="inputUser" class="form-control" placeholder="mail ou nom de l'utilisateur" required autofocus>
							</div>
						</div>
						
						<!-- Submit -->
						<div class="col-sm-3">
							<button class="btn btn-md btn-primary btn-block" type="submit">Rechercher</button>
						</div>
					</div>
				</div>
			</form>
<?php
	//else     
?>
			<!-- Formulaire -->
			<form class="form" action="resultat.html">
				<div class="jumbotron">
					<div class="row" style="margin-top:10px; margin-bottom:20px;">
						
						<!-- Mot Clef -->
						<div class="col-sm-5 col-md-6">
							<div class="input-group input-group-md">
								<span class="input-group-addon">
									<i class="fa fa-search"></i>
								</span>
								<label for="inputMotClef" class="sr-only">
									Mot clef
								</label>
								<input type="search" id="inputMotClef" class="form-control" placeholder="Mot clef" required autofocus>
							</div>
						</div>
					
						<!-- Categorie -->
						<div class="col-sm-2">
							<div class="input-group input-group-md">
								<label for="inputCategorie" class="sr-only">
									Categorie
								</label>
								<!-- <select multiple="multiple" id="inputCategorie"> -->
								<select id="inputCategorie">
										<option value="animal">animal</option>
										<option value="avion">avion</option>
										<option value="ordinateur">ordinateur</option>
										<option value="voiture">voiture</option>
								</select> 
							</div>
						</div>
						
						<div class="col-sm-3 col-md-2">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									Plus de choix
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Lieu</a></li>
									<li class="divider"></li>
									<li><a href="#">Prix mini</a></li>
									<li><a href="#">Prix maxi</a></li>
								</ul>
							</div>
						</div>
						<!-- Submit -->
						<div class="col-sm-2">
							<button class="btn btn-md btn-primary btn-block" type="submit">Chercher</button>
						</div>
					</div>
				</div>
			</form>
<?php
	//     
?>
<?php
//     
?>
        </div>
