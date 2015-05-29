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

            $vente = new Vente($idvente);

            if ($prix < $vente->prix + $vente->pas)
            {
                //~ erreur sur le prix saisie
                $erreur=1;
                $errMsg.="Le prix est incorrect (minimum ".($vente->prix + $vente->pas).")";
            }
            else
            {
                if (!DeposerEnchere($idvente, $idacheteur, $prix))
                {
                    $erreur=1;
                    $errMsg="<p>Erreur lors de l'ajout de l'enchère</p><a href=\"/?page=vente&id=$idvente\">Retour à la page de la vente</a>";
                }
            }
        }
        else
        {
            $erreur=1;
            $errMsg.="<p>veuillez saisir un prix</p><a href=\"/?page=vente&id=$idvente\">Retour à la page de la vente</a>";
        }

    }
    else
    {
        $erreur=1;
        $errMsg.="<p>la vente choisie est incorrecte</p><a href=\"/\">Retour à l'accueil</a>";
    }
}
else
{
    $erreur=1;
    $errMsg="<p>il faut etre connecté pour enchérir</p><a href=\"/connexion\">Retour à l'écran de connexion</a>";
}

if($erreur==1)
{
    include_once("vue/erreur.php");
}
else
{
    ?>
        <script>window.location="/?page=vente&id=<?= $idvente ?>";</script>
    <?php
}
