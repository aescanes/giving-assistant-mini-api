<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Categories

$router->get('/categories', ['uses' => 'CategoryController@showAllCategories']);

$router->get('/categories/{category_id}', ['uses' => 'CategoryController@showOneCategory']);

$router->post('/categories', ['uses' => 'CategoryController@createCategory']);

$router->put('/categories/{category_id}', ['uses' => 'CategoryController@updateCategory']);

$router->delete('/categories/{category_id}', ['uses' => 'CategoryController@deleteCategory']);

$router->get('/categories/{category_id}/merchants', ['uses' => 'CategoryController@showAllMerchantsFromCategory']);

// Merchants

$router->get('/merchants', ['uses' => 'MerchantController@showAllMerchants']);

$router->get('/merchants/{merchant_id}', ['uses' => 'MerchantController@showOneMerchant']);

$router->post('/merchants', ['uses' => 'MerchantController@createMerchant']);

$router->put('/merchants/{merchant_id}', ['uses' => 'MerchantController@updateMerchant']);

$router->delete('/merchants/{merchant_id}', ['uses' => 'MerchantController@deleteMerchant']);


