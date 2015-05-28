<?php
//Si utilisateur est déja connecté : redirection vers l'acceuil
if(!isset($_SESSION['id']) and !empty($_SESSION['id']))
{
    // Sinon on  traite les infos recu
    /* «traitementInscription.php»
     * Page de traitement de l'inscription
     *
     * s'occupe de rajouter le compte utilisateur dans la base de donnée
     *
     */

    include_once('core/model.php');
    include_once('core/bdd.php');
    include_once('core/upload.php');

    /* Récupération des différentes variables du formulaire */
    $erreur=0;
    $champErreur = " ";
    if (isset($_POST['inputEmail']) and !empty($_POST['inputEmail']))
    {
        $mail=htmlspecialchars($_POST['inputEmail']);
    }
    else
    {
        $erreur=1;
        $champErreur="Email manquante";
    }

    if (isset($_POST['inputPassword']) and !empty($_POST['inputPassword']))
    {
        $password=sha1(htmlspecialchars($_POST['inputPassword']));
    }
    else
    {
        if($erreur)
        {
            $champErreur.=", ";
        }
        $champErreur.="Mot de passe manquant";
        $erreur=1;
    }

    if (isset($_POST['inputPasswordBis']) and !empty($_POST['inputPasswordBis']))
    {
        $passwordBis=sha1(htmlspecialchars($_POST['inputPasswordBis']));
    }
    else
    {
        if($erreur)
        {
            $champErreur.=", ";
        }
        $champErreur.="Confirmation du mot de passe manquante";
        $erreur=1;
    }

    if (isset($_POST['inputNom']) and !empty($_POST['inputNom']))
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

    if (isset($_POST['inputPrenom']) and !empty($_POST['inputPrenom']))
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
        include_once("vue/inscription.php");
    }
    else
    {
        /* Tester que les 2 mots de passe sont identiques */
        if ($password != $passwordBis)
        {
            $errMsg="Les mots de passes ne corresponde pas.";
            include_once("vue/erreur.php");
            include_once("vue/inscription.php");
        }
        else
        {
            // Vérification du courriel
            $emailExiste = VerificationExistanceEmail($mail);
            if($emailExiste)
            {
                $errMsg="L'adresse email exite déjà.";
                include_once("vue/erreur.php");
                include_once("vue/inscription.php");
            }
            else
            {
                $verifCP = VerificationDuCodePostal($ville);
                if($verifCP==0)
                {
                    $errMsg="Code Postal non valide.";
                    include_once("vue/erreur.php");
                    include_once("vue/inscription.php");
                }
                else
                {
                    AjoutNouvelUtilisateur($mail, $nom, $prenom, $telephone, $adresse, $password, $verifCP);

                    // Vérification des identifiants
                    $verif=VerificationAjoutNouvelUtilisateur($mail, $password);

                    if ($verif==0)
                    {
                        $errMsg="Erreur pendant l'enregistrement de l'inscription.";
                        include_once("vue/erreur.php");
                        include_once("vue/inscription.php");
                    }
                    else
                    {
                        // on stocke les information du compte dans les variables de session
                        $_SESSION['id'] = $verif;
                        $_SESSION['email'] = $mail;
                        $_SESSION['nom'] = $nom;
                        $_SESSION['prenom'] = $prenom;
                        $_SESSION['telephone'] = $telephone;
                        $_SESSION['adresse'] = $adresse;
                        $_SESSION['idville'] = $verifCP;
                        $_SESSION['idstatut'] = 1;
                        $_SESSION['pwd'] = $password;
                        // traitement de l'image
                        $_SESSION['photo'] = $verifCP;
                        if (isset($_FILES['inputPhoto']) and !empty($_FILES['inputPhoto']))
                        {
                            $checkFile = UploadImage('profil/',$_FILES['inputPhoto'],2000000,$verif);
                            if($checkFile==0){
                                $_SESSION['photo'] = 'default.png';
                                ?>
                                    <script>window.location="/?errMsg='Votre inscription a bien étais prise en compte mais une erreur pendant la mise a jour de votre photo de profil est survenur'";</script>
                                <?php
                            }else{
                                $_SESSION['photo'] = $checkFile;
                            }
                        } else {
                            $_SESSION['photo'] = 'default.png';
                        }
                    ?>
                        <script>window.location="/";</script>
                    <?php
                    }
                }
            }
        }
    }
}

?>
