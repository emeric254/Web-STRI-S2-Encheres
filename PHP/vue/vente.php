<?php
/* «vente.php»
 * page affichant les details d'une vente
 * 
 * vars
 * $titreVente
 * $tempsVente
 * $prixVente
 * $nbEnchereVente
 * $photoVente
 * $descriptionVente
 * 
 * $encherisseursVente (tab des encherisseurs)
 * 
 * //@TODO commentaires ?
 * 
 * Remarque rémi
 * - Erreur dans include('core/vente.php') ?? sur la page web : warning chemin inconnu (car recherche du dossier core à l'intérieur du vue, mettre : '../core/vente.php')
 */
include('core/vente.php');
?>
			<div class="jumbotron">
				<div class="page-header">
					<div class="row">
						<h1>
							<?php print $titreVente; ?>
						</h1>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<h3>
								<span class="label label-warning">
									<?php print $tempsVente; ?>
								</span>
								
								&nbsp;
								<span class="label label-info">
									<?php print $prixVente; ?>
									€
									<span class="badge">
										<?php print $nbEnchereVente; ?>
									</span>
								</span>
							</h3>
						</div>
						<div class="col-md-4 col-lg-5">
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3">
							<img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="<?php print $photoVente; ?>" data-holder-rendered="true" style="width: 200px; height: 200px;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="well">
						<p>
							<?php print $descriptionVente; ?>
						</p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="col-md-5 col-lg-5">
					<h2>
						Derniers encherisseurs :
					</h2>
				</div>
				<div class="col-md-7 col-lg-7">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>
									Nom
								</th>
								<th>
									Enchere
								</th>
								<th>
									Depuis
								</th>
							</tr>
						</thead>
						<tbody>
<?php
//foreach(encherisseursVente)
/*
?>							
							<tr>
								<td>
									<?php print $nom; ?>
								</td>
								<td>
									<span class="label label-info">
										<?php print $prix; ?>
										€
									</span>
								</td>
								<td>
									<span class="label label-warning">
										<?php print $temps; ?>
									</span>
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
