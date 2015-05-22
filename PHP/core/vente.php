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

if( isset($_GET['id']) and !empty($_GET['id']))
{
	$id = htmlspecialchars($_GET['id']);
	$info = Vente_Info_General($id);
	$titreVente = $info['titreVente'];
	$tempsVente = $info['débutVente'] + $info['tempsVente'];
	$tempsVente = date('j/m/Y G:i', $tempsVente);
	$prixVente = $info['prixVente'];
	$photoVente = $info['photoVente'];
	$descriptionVente = $info['descriptionVente'];
	$nbEnchereVente=Vente_nb_enchere($id);
	$pasVente=$info['pasannonce'];

	if ($nbEnchereVente==1) {
		$prixVente=$prixVente+$pasVente;
	} elseif ($nbEnchereVente>1) {
		$maxEtSecond=Vente_info_enchereMax($id);
		$prixVente=$maxEtSecond['second']+$pasVente;
	}
	
	// test si valide
	//if(venteexiste) {
		include_once('vue/vente.php');
	//}
	//else
	//{
	//	messageErreur="vente introuvable ou non valide..."
	//	include_once('vue/erreur.php');
	//}
}
else
{
	$errMsg = "Pas d'enchére indiqué'";
	include_once("vue/erreur.php");
}
?>
