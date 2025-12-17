CREATE DATABASE transport;

use transport;

CREATE TABLE transport_livreur(
	id_livreur INT PRIMARY KEY AUTO_INCREMENT,
	nom_livreur VARCHAR(100)
);

INSERT INTO transport_livreur (nom_livreur) VALUES
('Rakoto Jean'),
('Randria Paul'),
('Rasoa Marie'),
('Raharison Luc'),
('Andrianina Sophie'),
('Rakotobe Michel');

CREATE TABLE transport_vehicule(
	id_vehicule INT PRIMARY KEY AUTO_INCREMENT,
	nom_vehicule VARCHAR(100),
	immatriculation VARCHAR(20)
);

INSERT INTO transport_vehicule (nom_vehicule, immatriculation) VALUES 
('Sprinter Mercedes', '6050 TAS'),
('DAF', '3421 TBA'),
('MAN', '7892 TAA'),
('ACTROS', '2109 TAF'),
('PREMIUM', '6783 TAG');

CREATE TABLE transport_statut(
	id_statut INT PRIMARY KEY AUTO_INCREMENT,
	nom_statut VARCHAR(100)
);

INSERT INTO transport_statut(nom_statut) VALUES 
('en attente'),
('livré'),
('annulé');

CREATE TABLE transport_colis(
	id_colis INT PRIMARY KEY AUTO_INCREMENT,
	nom_colis VARCHAR(100),
	poids_kg NUMERIC(10,2)
);

INSERT INTO transport_colis(nom_colis,poids_kg) VALUES
('Socobis',500),
('STAR',10000),
('Divers',5000),
('Letchis', 400),
('Electromenager',1000);

CREATE TABLE transport_livraison(
	id_livraison INT PRIMARY KEY AUTO_INCREMENT,
	id_colis INT,
	addresse_depart VARCHAR(100),
	addresse_destination VARCHAR(100),
	id_statut INT,
	
	FOREIGN KEY (id_colis) REFERENCES transport_colis(id_colis),
	FOREIGN KEY (id_statut) REFERENCES transport_statut(id_statut)
);

INSERT INTO transport_livraison (id_colis, addresse_depart, addresse_destination, id_statut) VALUES 
(1, 'France pub Tanjombato', 'Fianarantsoa', 2),
(2 'STAR Antsirabe', 'STAR Tanjombato', 2),
(3, 'Entrepot Akoor digue', 'Carefour Fianarantsoa', 2);


CREATE TABLE transport_historique_livraison(
	id_histo INT PRIMARY KEY AUTO_INCREMENT,
	id_livraison INT,
	id_livreur INT,
	id_vehicule INT,
	date_livraison DATE,
	montant_recette NUMERIC(10,2),
	salaire_livreur NUMERIC(10,2),

	FOREIGN KEY (id_livraison) REFERENCES transport_livraison(id_livraison),
	FOREIGN KEY (id_livreur) REFERENCES transport_livreur(id_livreur),
	FOREIGN KEY (id_vehicule) REFERENCES transport_vehicule(id_vehicule)
	
);


INSERT INTO transport_histo_livraison_jour (id_livraison, id_livreur,id_vehicule, date_livraison , montant_recette, salaire_livreur) VALUES 
(1, 1, 1, '2025-12-17', 500000, 100000),
(2, 2, 2, '2025-12-17', 2000000, 250000),
(3, 3, 3, '2025-12-18', 1500000, 200000);