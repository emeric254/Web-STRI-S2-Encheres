<?php
/* «nouveautes.php»
 * Page d'acceuil
 *
 */

include_once('core/class.php');
include_once('core/model.php');
include_once('vue/debut-tendances.php');

$ListNouv=RecuperationTendanceVente(10);

foreach($ListNouv as $idVente)
{
    $vente = new Vente($idVente);
    include('vue/resume-article.php');
    unset($vente);
}

include_once('vue/fin-contenu.php');

?>
