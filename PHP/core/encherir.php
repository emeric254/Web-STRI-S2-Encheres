<?php
/* «encherir.php»
 * page de traitement pour l'ajout d'une enchère.
 *
 */

include_once('core/model.php');
include_once('core/class.php');
include_once('core/bdd.php');

// Récupération des variables
$erreur=0;
$errMsg=" ";
if (isset($_SESSION['id']) and !empty($_SESSION['id']))
{
    $idacheteur=$_SESSION['id'];

    if (isset($_POST['id']) and !empty($_POST['id']) and $_POST['id'] >= 0)
    {
        $idvente=htmlspecialchars($_POST['id']);

        if (isset($_POST['prix']) and !empty($_POST['prix']))
        {
            $prix=htmlspecialchars($_POST['prix']);
            //~ test prix valable
            $vente = new Vente($idvente);
            if ($prix < $vente->prix + $vente->pas)
            {
                //~ erreur sur le prix saisie
                $erreur=1;
                $errMsg.="Le prix est incorrect (minimum ".($vente->prix + $vente->pas).")";
            }
        }
        else
        {
            $erreur=1;
            $errMsg.="veuillez saisir un prix";
        }

    }
    else
    {
        $erreur=1;
        $errMsg.="la vente choisie est incorrecte";
    }
}
else
{
    $erreur=1;
    $errMsg="il faut etre connecté pour enchérir";
}

var_dump($idvente);
var_dump($idacheteur);
var_dump($prix);
var_dump($vente);

if($erreur==1)
{
    $errMsg="Veuillez vérifier les erreur suivantes : $errMsg.";
    include_once("vue/erreur.php");
}
else
{
    // TODO : faire des test sur le droit d'enchérir !!
    if (!DeposerEnchere($idvente, $idacheteur, $prix))
    {
        $errMsg="Erreur lors de l'ajout de l'enchère";
        include_once("vue/erreur.php");
    }
    else
    {
        ?>
            <script>window.location="/?page=vente&id=<?php $idvente ?>";</script>
        <?php
    }
}