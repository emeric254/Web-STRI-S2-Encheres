<?php
/* «vente.php»
 * page de traitement pour la vue du même nom.
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
 * 
 * TODO :
 * Gestion du manque d'id
 */
include_once('core/model.php');
if( isset($_GET['id']) and !empty($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);
	$info = Vente_Info_General($id);
	$titreVente = $info['titreVente'];
	$tempsVente = $info['tempsVente'];
	$prixVente = $info['prixVente'];
	$photoVente = $info['photoVente'];
	$descriptionVente = $info['descriptionVente'];
	$nbEnchereVente=Vente_nb_enchere($id);
} else {
 //TODO Si le code arrive ici c'est que l'id de l"enchere n'est pas renseigné probablement avec un header location
}
?>
