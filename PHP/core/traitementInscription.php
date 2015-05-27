<?php
//Si utilisateur déja connecté : redirection vers l'acceuil
if (isset($_SESSION['id']) and !empty($_SESSION['id']))
{
    header("Location: /");
}
else
{
    // Sinon on  traite les infos recu
    /* «traitementInscription.php»
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

    include_once('core/model.php'); /* utile ????*/
    include_once('core/bdd.php'); /** TODO : modifier chemin */

    /* Récupération des différentes variables du formulaire */
    $erreur=0;
    $champErreur = " ";
    if (isset($_POST['inputEmail']) and !empty($_POST['inputEmail'])){
        $mail=htmlspecialchars($_POST['inputEmail']);
    }else{
        $erreur=1;
        $champErreur="Email manquante";
    }

    if (isset($_POST['inputPassword']) and !empty($_POST['inputPassword'])){
        $password=sha1(htmlspecialchars($_POST['inputPassword']));
    }else{
        if($erreur){
            $champErreur.=", ";
        }
        $champErreur.="Mot de passe manquant";
        $erreur=1;
    }

    if (isset($_POST['inputPasswordBis']) and !empty($_POST['inputPasswordBis'])){
        $passwordBis=sha1(htmlspecialchars($_POST['inputPasswordBis']));
    }else{
        if($erreur){
            $champErreur.=", ";
        }
        $champErreur.="Confirmation du mot de passe manquante";
        $erreur=1;
    }

    if (isset($_POST['inputNom']) and !empty($_POST['inputNom'])){
        $nom=htmlspecialchars($_POST['inputNom']);
    }else{
        if($erreur){
            $champErreur.=", ";
        }
        $champErreur.="Nom manquant";
        $erreur=1;
    }

    if (isset($_POST['inputPrenom']) and !empty($_POST['inputPrenom'])){
        $prenom=htmlspecialchars($_POST['inputPrenom']);
    }else{
        if($erreur){
            $champErreur.=", ";
        }
        $champErreur.="Prenom manquant";
        $erreur=1;
    }

    if (isset($_POST['inputPhone']) and !empty($_POST['inputPhone'])){
        $telephone=htmlspecialchars($_POST['inputPhone']);
    }else{
        if($erreur){
            $champErreur.=", ";
        }
        $champErreur.="Numero de telephone manquant";
        $erreur=1;
    }

    if (isset($_POST['inputAdresse']) and !empty($_POST['inputAdresse'])){
        $adresse=htmlspecialchars($_POST['inputAdresse']);
    }else{
        if($erreur){
            $champErreur.=", ";
        }
        $champErreur.="Adresse manquante";
        $erreur=1;
    }

    if (isset($_POST['inputVille']) and !empty($_POST['inputVille'])){
        $ville=htmlspecialchars($_POST['inputVille']);
    }else{
        if($erreur){
            $champErreur.=", ";
        }
        $champErreur.="Ville manquante";
        $erreur=1;
    }

    if($erreur==1){
        $errMsg="Veuillez vérifier les erreur suivante : $champErreur.";
        include_once("vue/erreur.php");
        include_once("vue/inscription.php");
    }else{
        /* Tester que les 2 ots de passe sont identiques */
        if ($password != $passwordBis)
        {
            $errMsg="Les mots de passes ne corresponde pas.";
            include_once("vue/erreur.php");
            include_once("vue/inscription.php");
        }else {
            //VERIFIER EMAIL
            /** Mode moche a verif et compléter - manque image, idville et idstatut */
            $emailExiste = VerificationExistanceEmail($mail);
            if($emailExiste){
                $errMsg="L'adresse email exite déjà.";
                include_once("vue/erreur.php");
                include_once("vue/inscription.php");
            } else {
                $verifCP = VerificationDuCodePostal($ville);
                if($verifCP==0){
			var_dump($ville);
			var_dump($verifCP);
                    $errMsg="Code Postal non valide.";
                    include_once("vue/erreur.php");
                    include_once("vue/inscription.php");
                }else{
                    AjoutNouvelUtilisateur($mail, $nom, $prenom, $telephone, $adresse, $password, $verifCP);

                    // on recherche les informations du compte dans la base
                    //DANS LE MODEL AUSSI
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
                        $_SESSION['idstatut'] = '1';
                        $_SESSION['pwd'] = $password;

                        // traitement de l'image
                        $_SESSION['photo'] = $verifCP;
                        if (isset($_FILES['inputPhoto']) and !empty($_FILES['inputPhoto']))
                        {
                            $checkFile = UploadImage('profil/',$_FILES['inputPhoto'],2000000,$verif);
                            if($checkFile==0){
                                $_SESSION['photo'] = 'default.png';
				echo "<script> window.location = '/?errMsg='Votre inscription a bien étais prise en compte mais une erreur pendant la mise a jour de votre photo de profil est survenur'' </script>";
                            }else{
                                $_SESSION['photo'] = $checkFile;
				echo '<script> window.location = "/" </script>';
                            }
                        } else {
                            $_SESSION['photo'] = 'default.png';
				echo '<script> window.location = "/" </script>';
                        }
                    }
                }
            }
        }
    }
}

?>

