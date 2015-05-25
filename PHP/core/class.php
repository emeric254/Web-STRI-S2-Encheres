<?php
include_once('core/model.php');
class Vente {
	public $id;
	public $nom;
	public $date;
	public $dateSeconde;
	public $tempsRestant;
	public $tempsRestantSeconde;
	public $Vendeur;
	public $Acheteur;
	public $nbEncherisseur;
	public $prix;
	public $photo;
	public $description;
	public $pas;
	
	function __construct($id) {
		$this->id = $id;
		$info = Vente_Info_General($id);
		$this->nom = $info['titreVente'];
		$this->dateSeconde = $info['débutVente'];
		$this->photo = $info['photoVente'];
		$this->description = $info['descriptionVente'];
		$this->pas = $info['pasannonce'];

		$dateFin = $info['débutVente'] + $info['tempsVente'];
		$this->tempsRestantSeconde = $dateFin - time();
		if ($this->tempsRestantSeconde>0) {
			$this->tempsRestant = gmdate("H:i:s", $dateFin - time());
		} else {
			$this->tempsRestant = 'Vente terminée';
		}

		$this->nbEncherisseur = Vente_nb_enchere($id);
		if ($this->nbEncherisseur==0){
			$this->prix = $info['prixVente'];
			$this->Acheteur = null;
		} elseif ($this->nbEncherisseur==1){
			$this->prix = $info['prixVente'] + $info['pasannonce'];
			$idAcheteur = Vente_info_MaxId($id);
			$this->Acheteur = new Profil($idAcheteur);
		} else {
			$max=Vente_info_enchereSecond($id);
			$this->prix=$max+$info['pasannonce'];
			$idAcheteur = Vente_info_MaxId($id);
			$this->Acheteur = new Profil($idAcheteur);
		}

		$this->Vendeur = new Profil($info['idVendeur']);
		
		$this->date = date('d/m/o G:i', $this->dateSeconde);
	}
}

class Profil {
	public $id;
	public $nom;
	public $email;
	public $prenom;
	public $telephone;
	public $adresse;
	public $photo;
	public $idVille;
	public $ville;
	public $statut;

	function __construct($id) {
		$this->id = $id;
		$info = Profil_Info_General($id);
		$this->nom = $info['nomutilisateur'];
		$this->email = $info['emailutilisateur'];
		$this->prenom = $info['prenomutilisateur'];
		$this->telephone = $info['telephoneutilisateur'];
		$this->adresse = $info['adresseutilisateur'];
		$this->photo = $info['urlphotoutilisateur'];
		$this->idVille = $info['idville'];
		$this->ville = Ville_Recup_Nom($info['idville']);
		$this->statut = $info['idstatut'];

		
	}
}
?>
