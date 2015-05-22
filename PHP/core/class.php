<?php
include('core/model.php');
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
		$this->nomVendeur = $info['idVendeur'];//need fonction soit pour récuperer le nom soit modifier le controleur, soit crée un objet profil
		$this->photo = $info['photoVente'];
		$this->description = $info['descriptionVente'];
		$this->pas = $info['pasannonce']:

		$dateFin = $info['débutVente'] + $info['tempsVente'];
		$this->tempsRestant = $dateFin - time();

		$this->nbEncherisseur = Vente_nb_enchere($id);
		if ($this->nbEncherisseur==0){
			$this->prix = $info['prixVente'];
		} elseif ($this->nbEncherisseur==1){
			$this->prix = $info['prixVente'] + $info['pasannonce'];
		} else {
			$max=Vente_info_enchereMax($id);
			$this->prix=$max+$info['pasannonce'];
		}
		
	}
}
?>
