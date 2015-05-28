<?php
# ----------- Fonction pour l'upload d'image

/*  Fonction d'upload d'une photo 
 *
 * $dossier : emplacement où l'image est stockee sur le serveur
 * $photo : valeur récupéré par $_FILES['photo']
 * $taille_maxi : taille maximale de l'image
 * $typePhoto : vaut 1 pour photo utilisateur et 2 pour photo objet
 *
 *
 *TODO:
 * - Enlever commentaire / * $fichier * /
 * - Voir si on modifie la valeur retournee
 */
function UploadImage($dossier,$photo,$taille_maxi,$id)
{
    include('core/bdd.php');
    $ret =0;
    $fichier = basename($photo['name']);
    $taille = filesize($photo['tmp_name']);
    $extensionsAccepte = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.PNG');
    $extension = strrchr($photo['name'],'.');
    // Vérification de la validité de l'image
    // on regarde si l'extension est dans le tableau
    if (!in_array($extension,$extensionsAccepte))
    {
        $erreur = "<script>alert(\"Vous devez uploader un fichier de type png, gif, jpg, jpeg.\");</script>";
    }
    // on regarde si la taille est correcte
    if ($taille>$taille_maxi)
    {
        $erreur = "<script>alert(\"La taille du fichier trop importante (max $taille_maxi).\");</script>";
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
        // formatage du nom du fichier (on retire les accents)
        $fichier = strtr($fichier,
                      'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                      'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($photo['tmp_name'], $dossier.$extension/*fichier*/)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné
        {
            rename($dossier.$extension/*fichier*/, $dossier.$id.$extension/*fichier*/);
            $ret= "$id"."$fichier";
        }
        else //Sinon (la fonction renvoie FALSE).
        {
          echo("<script>alert(\"l'upload a échoué.\");</script>");
        }
    }
    return $ret;
} ?>