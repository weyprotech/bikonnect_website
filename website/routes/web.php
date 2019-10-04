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

Route::get('/', array('as' => 'main.index', 'uses' => 'Frontend\MainController@index'));
Route::get('/solution', array('as' => 'main.solution', 'uses' => 'Frontend\MainController@solution'));
Route::get('/about', array('as' => 'main.about', 'uses' => 'Frontend\MainController@about'));
Route::get('/product/{productid}', array('as' => 'main.product', 'uses' => 'Frontend\MainController@product'));
Route::get('/privacy', array('as' => 'main.privacy', 'uses' => 'Frontend\MainController@privacy'));

Route::group(['prefix' => 'backend'], function(){
    Route::get('/', array('as' => 'panel.index', 'uses' => 'Backend\PanelController@index'));
    Route::get('/login', array('as' => 'panel.login', 'uses' => 'Backend\PanelController@login'));
    Route::post('/login', array('as' => 'panel.loginprocess', 'uses' => 'Backend\PanelController@loginprocess'));

    Route::group(['prefix' => 'solution'], function(){
        Route::match(['get', 'post'], '/video', array('as' => 'solution.video', 'uses' => 'Backend\SolutionController@video'));
        Route::match(['get', 'post'], '/content', array('as' => 'solution.content', 'uses' => 'Backend\SolutionController@content'));
        Route::match(['get', 'post'], '/content/edit/{solutionid}', array('as' => 'solution.content.edit', 'uses' => 'Backend\SolutionController@editcontent'));
        Route::post('/content/order_save', array('as' => 'solution.content.order_save', 'uses' => 'Backend\SolutionController@content_order_save'));
        Route::match(['get', 'post'], '/aspect', array('as' => 'solution.aspect', 'uses' => 'Backend\SolutionController@aspect'));
        Route::match(['get', 'post'], '/aspect/add', array('as' => 'solution.aspect.add', 'uses' => 'Backend\SolutionController@addaspect'));
        Route::match(['get', 'post'], '/aspect/edit/{aspectid}', array('as' => 'solution.aspect.edit', 'uses' => 'Backend\SolutionController@editaspect'));
        Route::post('/aspect/order_save', array('as' => 'solution.aspect.order_save', 'uses' => 'Backend\SolutionController@aspect_order_save'));        
        Route::get('/aspect/delete/{aId}', array('as' => 'solution.aspect.delete', 'uses' => 'Backend\SolutionController@aspect_delete'));
    });

    Route::group(['prefix' => 'about'], function(){
        Route::match(['get', 'post'], '/content', array('as' => 'about.content', 'uses' => 'Backend\AboutController@content'));
        Route::match(['get', 'post'], '/content/edit/{aboutid}', array('as' => 'about.content.edit', 'uses' => 'Backend\AboutController@editcontent'));
        Route::post('/content/order_save', array('as' => 'about.content.order_save', 'uses' => 'Backend\AboutController@content_order_save'));
        
        Route::match(['get', 'post'], '/history', array('as' => 'about.history', 'uses' => 'Backend\AboutController@history'));
        Route::match(['get', 'post'], '/history/add', array('as' => 'about.history.add', 'uses' => 'Backend\AboutController@addhistory'));
        Route::match(['get', 'post'], '/history/edit/{historyid}', array('as' => 'about.history.edit', 'uses' => 'Backend\AboutController@edithistory'));
        Route::post('/history/order_save', array('as' => 'about.history.order_save', 'uses' => 'Backend\AboutController@history_order_save'));
        Route::get('/history/delete/{aId}', array('as' => 'about.history.delete', 'uses' => 'Backend\AboutController@history_delete'));

        Route::match(['get', 'post'], '/team', array('as' => 'about.team', 'uses' => 'Backend\AboutController@team'));
        Route::match(['get', 'post'], '/team/add', array('as' => 'about.team.add', 'uses' => 'Backend\AboutController@addteam'));
        Route::match(['get', 'post'], '/team/edit/{teamid}', array('as' => 'about.team.edit', 'uses' => 'Backend\AboutController@editteam'));
        Route::post('/team/order_save', array('as' => 'about.team.order_save', 'uses' => 'Backend\AboutController@team_order_save'));
        Route::get('/team/delete/{tId}', array('as' => 'about.team.delete', 'uses' => 'Backend\AboutController@team_delete'));
        
        Route::match(['get', 'post'], '/partner', array('as' => 'about.partner', 'uses' => 'Backend\AboutController@partner'));
        Route::match(['get', 'post'], '/partner/add', array('as' => 'about.partner.add', 'uses' => 'Backend\AboutController@addpartner'));
        Route::match(['get', 'post'], '/partner/edit/{partnerid}', array('as' => 'about.partner.edit', 'uses' => 'Backend\AboutController@editpartner'));
        Route::post('/partner/order_save', array('as' => 'about.partner.order_save', 'uses' => 'Backend\AboutController@partner_order_save'));
        Route::get('/partner/delete/{pId}', array('as' => 'about.partner.delete', 'uses' => 'Backend\AboutController@partner_delete'));
    });

    Route::group(['prefix' => 'product'],function(){
        Route::match(['get', 'post'], '/index', array('as' => 'product.index', 'uses' => 'Backend\ProductController@index'));
        Route::match(['get', 'post'], '/add', array('as' => 'product.add', 'uses' => 'Backend\ProductController@add'));
        Route::match(['get', 'post'], '/edit/{productid}', array('as' => 'product.edit', 'uses' => 'Backend\ProductController@edit'));
        Route::post('/order_save', array('as' => 'product.order_save', 'uses' => 'Backend\ProductController@order_save'));
        Route::get('/delete/{aId}', array('as' => 'product.delete', 'uses' => 'Backend\ProductController@delete'));
    });

    Route::group(['prefix' => 'admin'], function(){
        Route::match(['get', 'post'], '/auth', array('as' => 'admin.auth', 'uses' => 'Backend\AdminController@auth'));
        Route::match(['get', 'post'], '/auth/add', array('as' => 'admin.auth.add', 'uses' => 'Backend\AdminController@addauth'));
        Route::match(['get', 'post'], '/auth/edit/{authid}', array('as' => 'admin.auth.edit', 'uses' => 'Backend\AdminController@editauth'));
        Route::get('auth/delete/{authid}', array('as' => 'admin.auth.delete', 'uses' => 'Backend\AdminController@deleteauth'));
    });
});