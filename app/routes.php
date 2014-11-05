<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', function() {
    return View::make('hello');
});


Route::group(array('prefix' => 'soul'), function() {

    Route::get('/', array('as' => 'login', 'uses' => 'LoginController@login'));
    Route::post('/chk_soul_login', array('as' => 'save_soul_login', 'uses' => 'LoginController@chk_soul_login'));
    Route::get('/soul_logout', array('as' => 'soul_logout', 'uses' => 'LoginController@soul_logout'));

    Route::group(array('before' => 'auth.soul'), function() {

        Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'LoginController@dashboard'));

        Route::group(array('prefix' => 'catalog'), function() {

            Route::group(array('prefix' => 'category'), function() {
                Route::get('/', array('as' => 'category', 'uses' => 'CategoryController@index'));
                Route::get('/add', array('as' => 'addNewCat', 'uses' => 'CategoryController@add'));
                Route::post('/edit', array('as' => 'editCat', 'uses' => 'CategoryController@edit'));
                Route::post('/save', array('as' => 'saveCat', 'uses' => 'CategoryController@save'));
                Route::post('/update', array('as' => 'updateCat', 'uses' => 'CategoryController@update'));
                Route::post('/delete', array('as' => 'deleteCat', 'uses' => 'CategoryController@delete'));
            });

            Route::group(array('prefix' => 'attrsets'), function() {
                Route::get('/', array('as' => 'attrsets', 'uses' => 'AttributeSetsController@index'));
                Route::get('/add', array('as' => 'addNewAttrSet', 'uses' => 'AttributeSetsController@add'));
                Route::post('/edit', array('as' => 'editAttrSet', 'uses' => 'AttributeSetsController@edit'));
                Route::post('/save', array('as' => 'saveAttrSet', 'uses' => 'AttributeSetsController@save'));
                Route::post('/update', array('as' => 'updateAttrSet', 'uses' => 'AttributeSetsController@update'));
                Route::post('/delete', array('as' => 'deleteAttrSet', 'uses' => 'AttributeSetsController@delete'));
            });

            Route::group(array('prefix' => 'attrs'), function() {
                Route::get('/', array('as' => 'attrs', 'uses' => 'AttributesController@index'));
                Route::get('/add', array('as' => 'addNewAttr', 'uses' => 'AttributesController@add'));
                Route::post('/edit', array('as' => 'editAttr', 'uses' => 'AttributesController@edit'));
                Route::post('/save', array('as' => 'saveAttr', 'uses' => 'AttributesController@save'));
                Route::post('/update', array('as' => 'updateAttr', 'uses' => 'AttributesController@update'));
                Route::post('/delete', array('as' => 'deleteAttr', 'uses' => 'AttributesController@delete'));
            });
            
            Route::group(array('prefix' => 'products'), function() {
                Route::get('/', array('as' => 'products', 'uses' => 'ProductsController@index'));
                Route::get('/add', array('as' => 'addNewProd', 'uses' => 'ProductsController@add'));
                Route::post('/edit', array('as' => 'editProd', 'uses' => 'ProductsController@edit'));
                Route::post('/save', array('as' => 'saveProd', 'uses' => 'ProductsController@save'));
                Route::post('/update', array('as' => 'updateProd', 'uses' => 'ProductsController@update'));
                Route::post('/delete', array('as' => 'deleteProd', 'uses' => 'ProductsController@delete'));
            });
        });
    });
});
