<?php

namespace app\controllers;

// use app\models\ProduitModel;

use app\models\ColisModel;
use app\models\HistoLivraisonModel;
use app\models\LivraisonModel;
use app\models\LivreurModel;
use app\models\StatutModel;
use app\models\VehiculeModel;

use Flight;
use flight\Engine;

class GestionLivraisonController {

	protected Engine $app;

	public function __construct($app) {
		$this->app = $app;
	}

	public function getinfopourinsertion() {
		
		$Colis=new ColisModel($this->app->db());
		$Allcolis=$Colis->getAllcolis();

		$vehicule=new VehiculeModel($this->app->db());
		$Allvehicule=$vehicule->getAllvehicule();

		$livreur=new LivreurModel($this->app->db());
		$Alllivreur=$livreur->getAlllivreur();

		$statut=new StatutModel($this->app->db());
		$Allstatut=$statut->getAllstatut();

		$resultat=[
			['colis' => $Allcolis],
			['vehicule' => $Allvehicule],
			['livreur' => $Alllivreur],
			['statut' => $Allstatut]
		];

		Flight::render('gestionlivraison',['resultats' => $resultat]);
	}

	public function insertlivraison(){
		$id_colis=Flight::request()->data->colis;
		$adresse_depart=Flight::request()->data->adressedepart;
		$adresse_destination=Flight::request()->data->adressedestination;
		$id_statut=Flight::request()->data->statut;
		$id_livreur=Flight::request()->data->chauffeur;
		$id_vehicule=Flight::request()->data->voiture;
		$montantcolisparkg=Flight::request()->data->montantcoliskg;
		$salaire=Flight::request()->data->salaire;

		$livraison=new LivraisonModel($this->app->db());
		$livraison->setidcolis($id_colis);
		$livraison->setadressedepart($adresse_depart);
		$livraison->setadressedestinaton($adresse_destination);
		$livraison->setidstatut($id_statut);

		$livraison->insererlivraison();

		$livraisonrecente=$livraison->getdernierelivraison();

		$histolivraison=new HistoLivraisonModel($this->app->db());
		$histolivraison->setidlivraison($livraisonrecente['id_livraison']);
		$histolivraison->setidlivreur($id_livreur);
		$histolivraison->setidvehicule($id_vehicule);


		$coliselect=new ColisModel($this->app->db());
		$poidscolis=$coliselect->getcolis($id_colis)['poids_kg'];

		$poidscolis=$poidscolis*$montantcolisparkg;

		$histolivraison->setmontantrecette($poidscolis);
		$histolivraison->setsalaire($salaire);

		$histolivraison->insererhistorique();

		$this->getinfopourinsertion();
	}
}