<?php
    // Sinon on  traite les infos reçue
    /* «traitementModificationProfil.php»
     * Page de traitement de l'inscription
     *
     * s'occupe de rajouter le compte dans la base de donnée
     *
     */

    include_once('core/model.php');

    /* Récupération des différentes variables du formulaire */
    $erreur=0;
    $champErreur = " ";

    if(isset($_POST['inputEmail']) and !empty($_POST['inputEmail']))
    {
        $mail=htmlspecialchars($_POST['inputEmail']);
    }
    else
    {
        $erreur=1;
        $champErreur="Email manquant";
    }

    if(isset($_POST['inputNom']) and !empty($_POST['inputNom']))
    {
        $nom=htmlspecialchars($_POST['inputNom']);
    }
    else
    {
        if($erreur)
        {
            $champErreur.=", ";
        }
        $champErreur.="Nom manquant";
        $erreur=1;
    }

    if(isset($_POST['inputPrenom']) and !empty($_POST['inputPrenom']))
    {
        $prenom=htmlspecialchars($_POST['inputPrenom']);
    }
    else
    {
        if($erreur)
        {
            $champErreur.=", ";
        }
        $champErreur.="Prénom manquant";
        $erreur=1;
    }

    if (isset($_POST['inputPhone']) and !empty($_POST['inputPhone']))
    {
        $telephone=htmlspecialchars($_POST['inputPhone']);
    }
    else
    {
        if($erreur)
        {
            $champErreur.=", ";
        }
        $champErreur.="Numéro de téléphone manquant";
        $erreur=1;
    }

    if (isset($_POST['inputAdresse']) and !empty($_POST['inputAdresse']))
    {
        $adresse=htmlspecialchars($_POST['inputAdresse']);
    }
    else
    {
        if($erreur)
        {
            $champErreur.=", ";
        }
        $champErreur.="Adresse manquante";
        $erreur=1;
    }

    if (isset($_POST['inputVille']) and !empty($_POST['inputVille']))
    {
        $ville=htmlspecialchars($_POST['inputVille']);
    }
    else
    {
        if($erreur)
        {
            $champErreur.=", ";
        }
        $champErreur.="Ville manquante";
        $erreur=1;
    }

    if($erreur==1)
    {
        $errMsg="Veuillez vérifier les erreur suivante : $champErreur.";
        include_once("vue/erreur.php");
        include_once("vue/modification-profil.php");
    }
    else
    {
        //~ ici pour faire verification code postal il faut passer en parametre le code postal et non l'idVille
        //~ $verifCP = VerificationDuCodePostal($ville);

        $verifCP=VerificationDuCodePostal($ville);

        if($verifCP==0)
        {
            $errMsg="Code Postal non valide. ".$ville;
            include_once("vue/erreur.php");
            include_once("vue/modification-profil.php");
        }
        else
        {
            $verif=utilisateursUpdateUtilisateur($_SESSION['id'], $nom, $prenom, $telephone, $adresse, $verifCP );

            if ($verif==0)
            {
                $errMsg="Erreur pendant la modification du profil.";
                include_once("vue/erreur.php");
                include_once("vue/modification-profil.php");
            }
            else
            {
                // on stocke les information du compte dans les variables de session
                $_SESSION['email'] = $mail;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['telephone'] = $telephone;
                $_SESSION['adresse'] = $adresse;
                $_SESSION['idville'] = $verifCP;

                 //Rediriger vers la racine
                $_GET['id']= $_SESSION['id'];
                include_once("core/profil.php");
            }
        }
    }

    ?>
