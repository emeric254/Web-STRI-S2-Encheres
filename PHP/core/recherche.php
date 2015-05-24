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
include_once('core/class.php');
if(isset($_GET['c']) and !empty($_GET['c'])){ 
	$choix=htmlspecialchars($_GET['c']);
}
if($choix==2){
	if(isset($_POST['inputMotClef']) and !empty($_POST['inputMotClef'])){
		$recherche = htmlspecialchars($_POST['inputMotClef']);
		if(isset($_POST['inputCategorie']) and !empty($_POST['inputCategorie'])){
			$cat=htmlspecialchars($_POST['inputCategorie']);
			$cat=1;
			$resulta=RechercheVente($recherche, $cat);
		} else {
			$resulta=RechercheVente($recherche);
		}
		include_once('vue/recherche.php');
		foreach($resulta as $idVente){
			$vente = new Vente($idVente);
			include('vue/resume-article.php');
			unset($vente);
		}
			
	}
} elseif($choix==1){
	
} else {
	include_once('vue/recherche.php');
}


?>
