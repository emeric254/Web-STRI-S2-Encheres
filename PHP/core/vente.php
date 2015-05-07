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
 * Generation des requete dans un autre fichier ?
 * TODO :
 * Gestion du manque d'id
 */
include('core/bdd.php');
if( isset($_GET['id']) and !empty($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);

	/* Récuperation des information général sur l'enchere */
	$req = " "; //Soit l'écrire ici soit récupérer depuis un autre fichier'
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	while ($donnees_reqExec = $reqExec->fetch()){
		$titreVente = $donnees_reqExec[''];
		$tempsVente = $donnees_reqExec[''];
		$prixVente = $donnees_reqExec[''];
		$photoVente = $donnees_reqExec[''];
		$descriptionVente = $donnees_reqExec[''];
	}

	/* Recuperation du nombre d'enchere */
	$req = " "; //Soit l'écrire ici soit récupérer depuis un autre fichier'
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	$i = 0:
	while ($donnees_reqExec = $reqExec->fetch()){
		$i = $i +1; // possibilité de faire une requete COUNT plutot que de compter le nombre de résulta
	}
	$nbEnchereVente=$i;
} else {
 //TODO Si le code arrive ici c'est que l'id de l"enchere n'est pas renseigné probablement avec un header location
}
?>
