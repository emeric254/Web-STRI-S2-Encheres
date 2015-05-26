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
 *
 * TODO :
 * Gestion du manque d'id
 *
 *
 * UploadImage :
 * - voir quels types d'images sont acceptées (j'ai mis un truc de base mais possibilité d'en retirer ou rajouter
 * - quand appel de la fonction, gérer l'affichage des scripts
 * - modifier l'emplacement de sauvegarde de l'image
 * - gérer le cas if (!empty($donnees['photo']))
 */


// session
//session_start();

// bdd
//include('core/bdd.php'); Besoin de l'inclure dans chaque fonction sinon ça marche pas
if(!file_exists("core/bdd.php"))
{
    $errMsg = "Fichier de configuration de la base de donnée introuvable";
    include("vue/erreur.php");
}


# -------------- Fonction controleur pour vente.php
function Profil_Info_General($id)
{
    include('core/bdd.php');

    $req = "SELECT * FROM utilisateur WHERE idutilisateur=?";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($id));

    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret['emailutilisateur'] = $donnees_reqExec['emailutilisateur'];
        $ret['nomutilisateur'] = $donnees_reqExec['nomutilisateur'];
        $ret['prenomutilisateur'] = $donnees_reqExec['prenomutilisateur'];
        $ret['telephoneutilisateur'] = $donnees_reqExec['telephoneutilisateur'];
        $ret['adresseutilisateur'] = $donnees_reqExec['adresseutilisateur'];
        $ret['urlphotoutilisateur'] = $donnees_reqExec['urlphotoutilisateur'];
        $ret['idville'] = $donnees_reqExec['idville'];
        $ret['idstatut'] = $donnees_reqExec['idstatut'];
    }
    return $ret;
}

function Vente_Info_General($id)
{
    include('core/bdd.php');

    $req = "SELECT * FROM annonce WHERE idannonce=?";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($id));

    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret['titreVente'] = $donnees_reqExec['nomannonce'];
        $ret['tempsVente'] = $donnees_reqExec['dureeannonce'];
        $ret['idVendeur'] = $donnees_reqExec['idutilisateur'];
        $ret['débutVente'] = $donnees_reqExec['dateannonce'];
        $ret['prixVente'] = $donnees_reqExec['prixdepartannonce'];
        $ret['photoVente'] = $donnees_reqExec['urlphotoannonce'];
        $ret['descriptionVente'] = $donnees_reqExec['descriptionannonce'];
        $ret['pasannonce'] = $donnees_reqExec['pasannonce'];
    }
    return $ret;

}

function Vente_info_MaxId($id)
{
    include('core/bdd.php');

    $req = "SELECT * FROM encherir WHERE idannonce =? ORDER BY prixenchere DESC LIMIT 1";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($id));

    $id = 0;

    while ($donnees_reqExec = $reqExec->fetch())
    {
            $id=$donnees_reqExec['idutilisateur'];
    }
    return $id;
}

function Vente_info_enchereSecond($id)
{
    include('core/bdd.php');

    $req = "SELECT * FROM encherir WHERE idannonce =? ORDER BY prixenchere DESC LIMIT 1 OFFSET 1";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($id));

    $max = 0;

    while ($donnees_reqExec = $reqExec->fetch())
    {
            $max=$donnees_reqExec['prixenchere'];
    }
    return $max;
}

function Vente_nb_enchere($id)
{
    include('core/bdd.php');

    $req = "SELECT * FROM encherir WHERE idannonce =?";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($id));

    $i = 0;

    while ($donnees_reqExec = $reqExec->fetch())
    {
        $i = $i +1;
    }
    return $i;
}

function Ville_Recup_Nom($id)
{
    include('core/bdd.php');

    $req = "SELECT * FROM ville WHERE idville =?";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($id));

    $nom = "";

    while ($donnees_reqExec = $reqExec->fetch())
    {
            $nom=$donnees_reqExec['nomville'];
    }
    return $nom;
}

# ----------- Fonction pour la navbar

function NavbarCheckInfo($id,$user,$pass)
{
    include('core/bdd.php');

    $req = "SELECT * FROM utilisateur WHERE idutilisateur='$id' AND emailutilisateur='$user' AND mdputilisateur='$pass' ";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array());

    $ret = 0;

    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret = 1;
    }
    return $ret;
}

function UtilisateurRecupererVente($id)
{
    include('core/bdd.php');

    $ret = array();
    $req = "SELECT idannonce FROM annonce WHERE idutilisateur=?";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($id));

    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret[]=$donnees_reqExec['idannonce'];
    }
    return $ret;
}

function UtilisateurRecupererEnch($id)
{
    include('core/bdd.php');

    $ret = array();
    $req = "SELECT idannonce FROM encherir WHERE idutilisateur=? GROUP BY idannonce";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($id));

    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret[]=$donnees_reqExec['idannonce'];
    }
    return $ret;
}

# ----------- Fonction pour récupérer la liste des catégories

function RecupererCategoriesAnnonce()
{
    include('core/bdd.php');

    $req = "SELECT idcategorie,nomcategorie FROM categorie";
    $reqExec = $db->prepare($req);
    $reqExec->execute();

    $ret = array();
    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret[$donnees_reqExec["idcategorie"]] = $donnees_reqExec["nomcategorie"];
    }

    var_dump($ret);
    return $ret;
}

# ----------- Fonction pour de vérification des informations d'une nouvelle annonce

function VerificationInformationAnnonce($titre,$description,$prix,$pas,$dureeJour,$dureeHeure,$dureeMinute)
{
    $duree=(((($dureeJour * 24) + $dureeHeure) * 60) + $dureeMinute);
    return ( strlen($titre) > 0 && strlen($description) > 0 && $prix > 0 && $pas > 0 && $duree > 0 );
}

# ----------- Fonction pour ajouter une annonce

/* TODO ; utilisation de $dateActuelle pour faire le select qui suit, mettrele time() direct dans la requete si autre solution */
function AjoutNouvelleAnnonce($titre,$description,$prix,$pas,$dureeJour,$dureeHeure,$dureeMinute,$idcategorie,$idutilisateur,$villeutilisateur)
{
    include('core/bdd.php');

    $duree=((((($dureeJour * 24) + $dureeHeure) * 60) + $dureeMinute) * 60);
    //~ $titreFormat=str_replace("'","''",$titre);
    //~ $descriptionFormat=str_replace("'","''",$description);
    $heureActuelle=time();

    $req="INSERT INTO annonce (nomannonce,descriptionannonce,prixdepartannonce,pasannonce,dateannonce,dureeannonce,urlphotoannonce,idutilisateur,idcategorie,idville) VALUES ('$titre','$description',$prix,$pas,$heureActuelle,$duree,'/vente/default.png',$idutilisateur,$idcategorie,1)";
    $reqExec = $db->prepare($req);
    $reqExec->execute();

    //~ // récupération de l'id
    //~ $req="SELECT idannonce FROM annonce WHERE (nomannonce='$titreFormat' AND descriptionannonce='$descriptionFormat' AND prixdepartannonce=$prix AND pasannonce=$pas AND dateannonce=$heureActuelle AND dureeannonce=$duree AND idutilisateur=$idutilisateur)";
    //~ $reqExec = $db->prepare($req);
    //~ $reqExec->execute();
//~
    //~ $ret=-1;
    //~ while ($donnees_reqExec = $reqExec->fetch())
    //~ {
        //~ $ret=$donnees_reqExec['idannonce'];
    //~ }
    //~ return $ret;
    return $db->lastInsertId();
}

# ----------- Fonction de vérification de l'ajout d'une annonce

function VerificationAjoutNouvelleAnnonce($idAnnonce)
{
    include('core/bdd.php');

    $resultats = $db->prepare('SELECT idannonce,nomannonce,descriptionannonce,prixdepartannonce,pasannonce,dateannonce,dureeannonce,urlphotoannonce,idutilisateur FROM annonce WHERE idannonce = :idA');
    $resultats->execute(array('idA' => $idAnnonce));

    $ret=0;
    while ($donnees_reqExec = $resultats->fetch())
    {
        $ret=$donnees_reqExec['idannonce'];
    }
    return $ret;
}

# ----------- Fonction de mise à jour de l'url de l'image annonce dans la base
function MajUrlImageAnnonce($fichier,$id)
{
    include('core/bdd.php');

    $resultats = $db->prepare('UPDATE annonce SET urlphotoannonce = :photo WHERE idannonce= :id');
    $resultats->execute(array(
        'photo' => $fichier,
        'id' => $id));
    //~ $donnees = $resultats->fetch(); //~ inutile ?
}

# ----------- Fonction de récupération des n dernières ventes

function AjoutNouvelUtilisateur($mail, $nom, $prenom, $telephone, $adresse, $password, $idVille)
{
    include('core/bdd.php');

    $req="INSERT INTO utilisateur (emailUtilisateur,nomutilisateur,prenomutilisateur,telephoneutilisateur,adresseutilisateur, idville ,mdputilisateur,idstatut,urlphotoutilisateur) VALUES ('$mail', '$nom', '$prenom', '$telephone', '$adresse', '$idVille', '$password',1,'default.png')";

    $reqExec = $db->prepare($req);
    $reqExec->execute();
}

function VerificationAjoutNouvelUtilisateur($mail, $password)
{
    include('core/bdd.php');

    $reqExec = $db->prepare('SELECT idutilisateur,emailutilisateur,nomutilisateur,prenomutilisateur,telephoneutilisateur,adresseutilisateur,urlphotoutilisateur,idville, idstatut, mdputilisateur FROM utilisateur WHERE emailutilisateur = :email AND mdputilisateur = :mdp');
    $reqExec->execute(array(
    'email' => $mail,
    'mdp' => $password));

    $ret = 0;

    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret=$donnees_reqExec['idutilisateur'];
    }
    return $ret;
}

function VerificationExistanceEmail($mail)
{
    include('core/bdd.php');

    $req = "SELECT * FROM utilisateur WHERE emailutilisateur = ?";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($mail));

    $ret = 0;

    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret=1;
    }
    return $ret;
}


function VerificationDuCodePostal($ville)
{
    include('core/bdd.php');

    $long=strlen($ville);

    while($long<5){
        $ville = "0".$ville;
        $long++;
    }

    $req = "SELECT * FROM ville WHERE codepostalville = ?";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($ville));

    $ret = 0;

    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret=$donnees_reqExec['idville'];
    }

    return $ret;
}

function RecuperationDerniereVente($limite)
{
    include('core/bdd.php');

    $req = "SELECT idannonce FROM annonce WHERE annonce.dureeannonce + annonce.dateannonce > ".time()." Group BY annonce.idannonce ORDER BY dateannonce DESC LIMIT ?";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($limite));

    $ret = array();
    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret[]=$donnees_reqExec['idannonce'];
    }
    return $ret;
}

function RecuperationTendanceVente($limite)
{
    include('core/bdd.php');

    $req = "SELECT COUNT(*), annonce.idannonce FROM encherir, annonce WHERE annonce.idannonce=encherir.idannonce AND annonce.dureeannonce + annonce.dateannonce > ".time()." Group BY annonce.idannonce ORDER BY count DESC LIMIT ?";
    $reqExec = $db->prepare($req);
    $reqExec->execute(array($limite));

    $ret = array();
    while ($donnees_reqExec = $reqExec->fetch())
    {
        $ret[]=$donnees_reqExec['idannonce'];
    }
    return $ret;
}

?>
