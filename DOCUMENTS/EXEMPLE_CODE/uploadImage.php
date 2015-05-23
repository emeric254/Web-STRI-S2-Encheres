<?php
       include 'fonctions/fonctionsQuery.php';
       //Variables
       $id_ville=$_POST['id_ville'];
       $titre=$_POST['titre'];
       $description=$_POST['description'];
       $id_categorie=$_POST["dossier"];
       
       
       //Get nom fichier
       $nom = $_FILES['fichier']['name'];
       //Get type
       $type = $_FILES['fichier']['type'];
       //Get taille
       $taille = $_FILES['fichier']['size'];
       //Get dossier temps
       $tmp = $_FILES['fichier']['tmp_name'];
       //Get si erreur
       $error = $_FILES['fichier']['error'];
       $dossier = "img/plaques/".$_POST["dossier"];
       $extension = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );
       
        //Insertion fichier
	$uniqueMD5=md5(uniqid(rand(), true));
	$new_nom = $dossier."/".$uniqueMD5.".".$extension;
	$chemin="img/plaques/".$id_categorie."/".$uniqueMD5.".".$extension;
       
       try 
       {
	      //Lancer les vérifs erreur_systeme, type, taille_max, throw si !OK
	      verifs($_FILES);
	      
	      
	      //Vérifier si le dossier existe si non , le créer
	      if (!file_exists($dossier))
	      {
		     mkdir($dossier, 0777, true);
	      }
	     
	      $transfert = move_uploaded_file($tmp, $new_nom);
	      if ($transfert)
	      {
		     //Préparer la requete
		     $req = $bdd2->prepare('INSERT INTO image (id_categorie, id_ville, titre,description, chemin) VALUES (?,?,?,?,?)'); 
		     $req->execute(array($id_categorie, $id_ville, $titre,$description,$chemin));
		     echo " <p> Nom: ".$nom."<br> Type: ".$type."<br> Taille: ".($taille/1000000)." Mo <br /> Id ville: ".$id_ville."<br>Titre: ".$titre."<br>Description: ".$description."<br> Id categorie: $id_categorie <br> Chemin: ".$chemin."<br> Transfert OK </p>";
	      }
       }
       catch (Exception $e)
       {
	      echo $e->getMessage()."\n";
       }
       
       
       function verifs ($_FILES_V)
       {
	      //Capture d'une éventuelle erreur lors du transfert
	      if ($_FILES_V['fichier']['error'] > 0  )
	      {
		     $erreur = $_FILES_V['fichier']['error'];
		     switch ($erreur)
		     {
			    case UPLOAD_ERR_NO_FILE : $msg ="fichier manquant";
				   break;
			    case UPLOAD_ERR_INI_SIZE : $msg ="fichier dépassant la taille maximale supportée par php";
				   break;
			    case UPLOAD_ERR_FORM_SIZE : $msg ="fichier dépassant la taille max autorisée";
				   break;
			    case UPLOAD_ERR_PARTIAL : $msg ="fichier transféré partiellement";			    
		     }
		     throw new Exception ("Erreur lors du transfert: ".$msg);
	      }
	      //Controle de l'extension
	      $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	      $extension_upload = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );
	      if(!in_array($extension_upload,$extensions_valides) ) 
	      {
		     $erreur ="Erreur, type de fichier non valide (Admis : jpg , jpeg, gif, png)";
		     throw new Exception($erreur);
	      }      
       }
       	$result=mysql_query("SELECT nom_categorie FROM categorie ");
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
	{
		echo "Nom: ". $row["nom_categorie"];
	}
              
?>

