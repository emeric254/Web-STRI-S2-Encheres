<?php
include_once('core/model.php');
class Vente {
	public $id;
	public $nom;
	public $date;
	public $tempsRestant;
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
		$this->date = $info['débutVente'];
		$this->photo = $info['photoVente'];
		$this->description = $info['descriptionVente'];
		$this->pas = $info['pasannonce'];

		$dateFin = $info['débutVente'] + $info['tempsVente'];
		$this->tempsRestant = $dateFin - time();

		$this->nbEncherisseur = Vente_nb_enchere($id);
		if ($this->nbEncherisseur==0){
			$this->prix = $info['prixVente'];
		} elseif ($this->nbEncherisseur==1){
			$this->prix = $info['prixVente'] + $info['pasannonce'];
		} else {
			$max=Vente_info_enchereSecond($id);
			$this->prix=$max+$info['pasannonce'];
		}

		$this->Vendeur = new Profil($info['idVendeur']);
		$idAcheteur = Vente_info_MaxId($id);
		$this->Acheteur = new Profil($idAcheteur);
		
	}
}

class Profil {
	public $id;
	public $nom;
	public $email;
	public $prenom;
	public $telephone;
	public $addresse;
	public $photo;
	public $ville;
	public $statut;

	function __construct($id) {
		$this->id = $id;
		$info = Profil_Info_General($id);
		$this->nom = $info['nomutilisateur'];
		$this->email = $info['emailutilisateur'];
		$this->prenom = $info['prenomutilisateur'];
		$this->telephone = $info['telephoneutilisateur'];
		$this->addresse = $info['adresseutilisateur'];
		$this->photo = $info['urlphotoutilisateur'];
		$this->ville = Ville_Recup_Nom($info['idville']);
		$this->statut = $info['idstatut'];

		
	}
}
?>
