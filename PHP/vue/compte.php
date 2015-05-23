<?php
/* «compte.php»
 * page qui est le "mon compte" de l'utilisateur
 * se décompose en plusieurs parties :
 * 	>	choix de la page a afficher
 * 	>> 	profil de l'utilisateur
 * 	>> 	historique des encheres/achats
 * 	>>	historique des ventes
 * 
 * 
 * vars :
 * 	> $choix 	(defaut=menu, 1=profil, 2=achats, 3=ventes)
 * 	> $achats	(tableau de "vente")
 * 	> $ventes	(tableau de "vente")
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

	include("profil.php");

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
											Vendeur
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
foreach($achats as $achat)
{
?>
								<tr>
									<td colspan="3">
										<?php print $achat->nom; ?>
									</td>
									<td>
										<?php print $achat->date; ?>
									</td>
									<td>
										<?php print $vente->Vendeur->nom; ?>
									</td>
									<td>
										<?php print $achat->prix; ?>
										€
									</td>
									<td>
										<a class="btn btn-default" href="enchere-<?php print $achat->id; ?>">
											<i class="fa fa-code-fork"></i>
											Voir
										</a>
									</td>
								</tr>
<?php
}
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
foreach($ventes as $vente)
{
?>
								<tr>
									<td colspan="3">
										<?php print $vente->nom; ?>
									</td>
									<td>
										<?php print $vente->date; ?>
									</td>
									<td>
										<?php print $vente->Acheteur->nom; ?>
									</td>
									<td>
										<?php print $vente->prix; ?>
										€
									</td>
									<td>
										<a class="btn btn-default" href="enchere-<?php print $vente->id; ?>">
											<i class="fa fa-code-fork"></i>
											Voir
										</a>
									</td>
								</tr>
<?php
}
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
						<a href="/?page=compte&c=1&id=<?php echo $_GET['id']?>">
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
