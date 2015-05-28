<?php
    // Sinon on  traite les infos recu
    /* «traitementModificationProfil.php»
     * Page de traitement de l'inscription
     *
     * s'occupe de rajouter le compte dans la base de donnée
     *
     * TODO:
     * - utile de include_once('core/model.php'); ?
     * - faire un test que les valeurs envoyées par le formulaire ne sont pas vide ou inexistante
     * - Voir comment on gère l'image associé au profil utilisateur
     * - tester mots de passe identique ici ou dans le form ? si ici, manque un id pour le second mdp dans le form
     * - tester que l'utilisateur n'existe pas déjà en comparant l'email
     * - dans requete, obn met idStatut à 1 mais gérer avec la bonne valeur => a déterminer dans la table statut
     * - gérer les valeurs a mettre pour la ville et le statut (les id)
     * - gérer le if ( !donnees)
     * - gérer quand la requete d'insertion fonctionne
     * - quand on se trouver sur la parge d'un objet, rediriger vers cette meme page plutot que vers l'index
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
        $champErreur="Email manquante";
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
        $champErreur.="Prenom manquant";
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
        $champErreur.="Numero de telephone manquant";
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

        $verifCP=VerificationDuCodePostal(recupCodePostalIdVille($idVille));

        if($verifCP==0)
        {
            $errMsg="Code Postal non valide. ".$ville;
            include_once("vue/erreur.php");
            include_once("vue/modification-profil.php");
        }
        else
        {
            $verif=utilisateursUpdateUtilisateur($_SESSION['id'], $nom, $prenom, $telephone, $adresse, $ville );

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
