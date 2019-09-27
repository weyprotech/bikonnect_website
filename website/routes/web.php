<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'backend'], function(){
    Route::get('/', array('as' => 'panel.index', 'uses' => 'Backend\PanelController@index'));
    Route::get('/login', array('as' => 'panel.login', 'uses' => 'Backend\PanelController@login'));

    Route::group(['prefix' => 'solution'], function(){
        Route::get('/video', array('as' => 'solution.video', 'uses' => 'Backend\SolutionController@video'));
        Route::get('/content', array('as' => 'solution.content', 'uses' => 'Backend\SolutionController@content'));
        Route::get('/aspect', array('as' => 'solution.aspect', 'uses' => 'Backend\SolutionController@aspect'));
    });
});