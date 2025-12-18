<?php
namespace app\controllers;

use app\models\ColisModel;
use app\models\HistoLivraisonModel;
use app\models\LivraisonModel;
use app\models\LivreurModel;
use app\models\StatutModel;
use app\models\VehiculeModel;

use Flight;
use flight\Engine;
class BeneficeController {
    protected Engine $app;
    
    public function __construct($app) {
        $this->app = $app;
    }
    
    public function getBeneficeJour() {
        $beneficeModel = new BeneficeModel($this->app->db());
        $date_debut = Flight::request()->query->date_debut ?? null;
        $date_fin = Flight::request()->query->date_fin ?? null;
        $benefices = $beneficeModel->getBeneficeJour($date_debut, $date_fin);
        
        Flight::render('BeneficePeriode', [
            'type' => 'jour',
            'benefices' => $benefices,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'titre' => 'Bénéfices par Jour'
        ]);
    }
    
    public function getBeneficeMois() {
        $beneficeModel = new BeneficeModel($this->app->db());
        $annee = Flight::request()->query->annee ?? null;
        $mois = Flight::request()->query->mois ?? null;
        $benefices = $beneficeModel->getBeneficeMois($annee, $mois);
        
        Flight::render('BeneficePeriode', [
            'type' => 'mois',
            'benefices' => $benefices,
            'annee' => $annee,
            'mois' => $mois,
            'titre' => 'Bénéfices par Mois'
        ]);
    }
    
    public function getBeneficeAnnee() {
        $beneficeModel = new BeneficeModel($this->app->db());
        $annee_debut = Flight::request()->query->annee_debut ?? null;
        $annee_fin = Flight::request()->query->annee_fin ?? null;
        $benefices = $beneficeModel->getBeneficeAnnee($annee_debut, $annee_fin);
        
        Flight::render('BeneficePeriode', [
            'type' => 'annee',
            'benefices' => $benefices,
            'annee_debut' => $annee_debut,
            'annee_fin' => $annee_fin,
            'titre' => 'Bénéfices par Année'
        ]);
    }
    
    public function getDashboard() {
        $beneficeModel = new BeneficeModel($this->app->db());
        $benefices_jour = $beneficeModel->getBeneficeJour(null, null);
        $benefices_mois = $beneficeModel->getBeneficeMois();
        $benefices_annee = $beneficeModel->getBeneficeAnnee();
        $annees_disponibles = $beneficeModel->getAnneesDisponibles();
        
        Flight::render('BeneficeDashboard', [
            'benefices_jour' => array_slice($benefices_jour, 0, 7),
            'benefices_mois' => array_slice($benefices_mois, 0, 12),
            'benefices_annee' => $benefices_annee,
            'annees_disponibles' => $annees_disponibles
        ]);
    }
}