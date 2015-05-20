 <?php
/* «traitementInscription.php»
 * Page de traitement de l'inscription
 * 
 * s'occupe de rajouter le compte dans la base de donnée
 *
 * TODO:
 * - utile de include_once('core/model.php'); ?
 * - faire un test que les valeurs envoyées par le formulaire ne sont pas vide ou inexistante
 * - Voir comment on gère l'image associé au profil utilisateur
 */
 
//include_once('core/model.php'); /* utile ????*/

/* Récupération des différentes variables du formulaire */
$mail=$_POST['inputEmail'];
$password=$_POST['inputPassword'];
$nom=$_POST['inputNom'];
$prenom=$_POST['inputPrenom'];
$photo=$_POST['inputPhoto']; /**** Voir comment on récupère l'image et la stocke coté client ****/
$telephone=$_POST['inputPhone'];
$adresse=$_POST['inputAdresse'];
$ville=$_POST['inputVille'];


/* Affichage des informations récupérées */
echo "<div> mail : $mail<br> password : $password<br> nom : $nom<br>prenom : $prenom";
echo "<br> telephone : $telephone<br>addresse : $adresse <br> ville : $ville<br> </div>";


?>


