<?php

use app\controllers\ProduitController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {
	$controller = new ProduitController($app);
	$router->get('/',function(){
		Flight::render('accueil');
	});

	$router->get('/produit/@id', [$controller,'getProduit']);

	$router->get('/ajout',function(){
		Flight::render('ajout');
	});

	$router->get('/ajout/@id',function($id){
		Flight::render('ajout',['id' => $id]);
	});

	$router->post('/add', [$controller,'addProduit']);
	
}, [ SecurityHeadersMiddleware::class ]);