<?php
/* «compte.php»
 * page qui est le "mon compte" de l'utilisateur
 * 
 * se décompose en plusieurs parties
 * 
 * >	choix de la page a afficher
 * >> 	profil de l'utilisateur
 * >> 	historique des encheres/achats
 * >>	historique des ventes
 * 
 * vars
 * $choix (defaut=menu, 1=profil, 2=achats, 3=ventes)
 * 
 * profil
 * > $nomUser
 * > $prenomUser
 * > $photoUser
 * > $mailUser
 * > $numeroUser
 * > $adresseUser
 * 
 * //@TODO achats
 * //@TODO ventes
 * 
 */
?>        
        <!-- Contenu -->
        <div class="container">
			<div class="jumbotron">
<?php
switch($choix)
{
	case 1:	// profil
?>      		
				<div class="page-header">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-7">
							<h1>
								<?php print $nomUser." ".$prenomUser ?>
							</h1>
						</div>
						<div class="col-sm-1 col-md-2 col-lg-2"> </div>
						<div class="col-sm-5 col-md-4 col-lg-3">
							<img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="<?php print $photoUser ?>" data-holder-rendered="true" style="width: 200px; height: 200px;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="well">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="2">
										<b>
											Informations personelles
										</b>
									</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										Email
									</td>
									<td>
										<?php print $mailUser ?>
									</td>
								</tr>
								<tr>
									<td>
										Telephone
									</td>
									<td>
										<?php print $numeroUser ?>
									</td>
								</tr>
								<tr>
									<td>
										Adresse
									</td>
									<td>
										<?php print $adresseUser ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
<?php
		break;
	case 2:	// achats
?>   				
				<div class="page-header">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-7">
							<h1>
								Vos encheres
							</h1>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="well">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="3">
										<b>
											Nom
										</b>
									</td>
									<td>
										<b>
											Date
										</b>
									</td>
									<td>
										<b>
											Encherisseurs
										</b>
									</td>
									<td>
										<b>
											Prix
										</b>
									</td>
									<td>
										<b>
											Lien
										</b>
									</td>
								</tr>
							</thead>
							<tbody>
<?php
//while()
/*
?>
								<tr>
									<td colspan="3">
										<?php print $nomVente ?>
									</td>
									<td>
										<?php print $dateVente ?>
									</td>
									<td>
										<?php print $countEncherisseur ?>
									</td>
									<td>
										<?php print $enchereMaxVente ?>
										€
									</td>
									<td>
										<a class="btn btn-default" href="<?php print $enchere ?>">
											<i class="fa fa-code-fork"></i>
											Voir
										</a>
									</td>
								</tr>
<?php
*/
//
?>
							</tbody>
						</table>
					</div>
				</div>
			
<?php
		break;
	case 3: // ventes
?>
				<div class="page-header">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-7">
							<h1>
								Vos Ventes
							</h1>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="well">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="3">
										<b>
											Nom
										</b>
									</td>
									<td>
										<b>
											Date
										</b>
									</td>
									<td>
										<b>
											Acquerisseur
										</b>
									</td>
									<td>
										<b>
											Prix
										</b>
									</td>
									<td>
										<b>
											Lien
										</b>
									</td>
								</tr>
							</thead>
							<tbody>
<?php
//while()
/*
?>
								<tr>
									<td colspan="3">
										<?php print $nomVente ?>
									</td>
									<td>
										<?php print $dateVente ?>
									</td>
									<td>
										<?php print $encherisseurVente ?>
									</td>
									<td>
										<?php print $enchereMaxVente ?>€
									</td>
									<td>
										<a class="btn btn-default" href="http://google.fr">
											<i class="fa fa-code-fork"></i>
											Voir
										</a>
									</td>
								</tr>
<?php
*/
//
?>
							</tbody>
						</table>
					</div>
				</div>
<?php
		break;
	default	:	// menu
?>
				<h2 style="text-align:center;">
					Mon compte 
				</h2>
				<p></p>
				<ul class="nav nav-pills nav-justified">
					<li class="active">							
						<a href="user.html">
							<i class="fa fa-search"></i>
							&nbsp;
							Mon profil
						</a>
					</li>
				</ul>	
				<p></p>
				<ul class="nav nav-pills nav-justified">
					<li class="active">											
						<a href="user-vente.html">
							<i class="fa fa-search"></i>
							&nbsp;
							Mes Ventes
						</a>
					</li>
				</ul>	
				<p></p>
				<ul class="nav nav-pills nav-justified">
					<li class="active">											
						<a href="user-historique.html">
							<i class="fa fa-search"></i>
							&nbsp;
							Mes Achats
						</a>
					</li>
				</ul>
<?php
} // fin switch
?>
			</div>	
        </div>