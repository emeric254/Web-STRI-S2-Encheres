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
 */

include_once('core/model.php');
include_once('core/class.php');

$choix=0;

if(isset($_GET['c']) and !empty($_GET['c']))
{
    $choix=htmlspecialchars($_GET['c']);
}

if($choix==2)
{
    $listCat = RecuperationDesCat();
    $recherche = "%";

    if(isset($_POST['inputMotClef']) and !empty($_POST['inputMotClef']))
    {
        $recherche = htmlspecialchars($_POST['inputMotClef']);
    }

    if(isset($_POST['inputCategorie']) and !empty($_POST['inputCategorie']))
    {
        $cat=htmlspecialchars($_POST['inputCategorie']);
        $resultat=RechercheVente($recherche, $cat);
    }
    else
    {
        $resultat=RechercheVente($recherche);
    }

    include_once('vue/recherche.php');

    foreach($resultat as $idVente)
    {
        $vente = new Vente($idVente);
        include('vue/resume-article.php');
        unset($vente);
    }

}
else
if($choix==1)
{
    $recherche = "%";

    if(isset($_POST['inputUser']) and !empty($_POST['inputUser']))
    {
        $recherche = htmlspecialchars($_POST['inputUser']);
    }

    $resultat=RechercheUser($recherche);

    include_once('vue/recherche.php');

    foreach($resultat as $idProfil)
    {
        $profil = new Profil($idProfil);
        include('vue/resume-profil.php');
        unset($profil);
    }
}
else
{
    include_once('vue/recherche.php');
}

include_once('vue/fin-contenu.php');


?>
