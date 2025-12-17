<?php

use app\controllers\GestionLivraisonController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {
	$controller = new GestionLivraisonController($app);
	$router->get('/',function(){
		Flight::render('accueil');
	});

	$router->get('/gestion/livraison', [$controller,'getinfopourinsertion']);

	$router->post('/gestion/livraison/inserer', [$controller,'insertlivraison']);
	
	$router->get('/ajout',function(){
		Flight::render('ajout');
	});

	$router->get('/ajout/@id',function($id){
		Flight::render('ajout',['id' => $id]);
	});

	
	
}, [ SecurityHeadersMiddleware::class ]);