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
Route::get('/{locale?}', array('as' => 'main.index', 'uses' => 'Frontend\MainController@index'));
Route::get('{locale?}/', array('as' => 'main.index', 'uses' => 'Frontend\MainController@index'));
Route::get('/solution/{locale?}', array('as' => 'main.solution', 'uses' => 'Frontend\MainController@solution'));
Route::get('/about/{locale?}', array('as' => 'main.about', 'uses' => 'Frontend\MainController@about'));
Route::get('/product/{url}/{locale?}', array('as' => 'main.product', 'uses' => 'Frontend\MainController@product'));
Route::get('/privacy/{locale?}', array('as' => 'main.privacy', 'uses' => 'Frontend\MainController@privacy'));
Route::get('/term/{locale?}', array('as' => 'main.term', 'uses' => 'Frontend\MainController@term'));
Route::get('/blog/{page}/{locale?}',array('as' => 'blog.index','uses' => 'Frontend\MainController@blog'));
Route::match(['get','post'],'/blog_detail/{blogid}/{page}/{locale?}',array('as' => 'blog.detail','uses' => 'Frontend\MainController@blog_detail'));
Route::post('/ajax/get_blog',array('as' => 'ajax.get_blog','uses' => 'Frontend\AjaxController@get_blog'));
Route::post('/send_email',array('as' => 'main.send_email','uses' => 'Frontend\MainController@send_email'));

Route::get('/error/index',array('as' => 'main.error','uses' => 'Frontend\ErrorController@index'));

Route::group(['prefix' => 'backend'], function(){
    Route::get('/index', array('as' => 'panel.index', 'uses' => 'Backend\PanelController@index'));
    Route::get('/login', array('as' => 'panel.login', 'uses' => 'Backend\PanelController@login'));
    Route::post('/login', array('as' => 'panel.loginprocess', 'uses' => 'Backend\PanelController@loginprocess'));

    //解決方案
    Route::group(['prefix' => 'solution'], function(){
        //主題
        Route::match(['get', 'post'], '/title', array('as' => 'solution.title', 'uses' => 'Backend\SolutionController@title'));

        //影片區
        Route::match(['get', 'post'], '/video', array('as' => 'solution.video', 'uses' => 'Backend\SolutionController@video'));
        
        //架構
        Route::match(['get', 'post'], '/service', array('as' => 'solution.service', 'uses' => 'Backend\SolutionController@service'));

        //Application Range區
        Route::match(['get', 'post'], '/application', array('as' => 'solution.application', 'uses' => 'Backend\SolutionController@application'));
        Route::match(['get', 'post'], '/application/edit/{applicationid}', array('as' => 'solution.application.edit', 'uses' => 'Backend\SolutionController@editapplication'));
        Route::post('/application/order_save', array('as' => 'solution.application.order_save', 'uses' => 'Backend\SolutionController@application_order_save'));

        //圖文區
        Route::match(['get', 'post'], '/content', array('as' => 'solution.content', 'uses' => 'Backend\SolutionController@content'));
        Route::match(['get', 'post'], '/content/edit/{solutionid}', array('as' => 'solution.content.edit', 'uses' => 'Backend\SolutionController@editcontent'));
        Route::post('/content/order_save', array('as' => 'solution.content.order_save', 'uses' => 'Backend\SolutionController@content_order_save'));

        //特點維護
        Route::match(['get', 'post'], '/aspect', array('as' => 'solution.aspect', 'uses' => 'Backend\SolutionController@aspect'));
        Route::match(['get', 'post'], '/aspect/add', array('as' => 'solution.aspect.add', 'uses' => 'Backend\SolutionController@addaspect'));
        Route::match(['get', 'post'], '/aspect/edit/{aspectid}', array('as' => 'solution.aspect.edit', 'uses' => 'Backend\SolutionController@editaspect'));
        Route::post('/aspect/order_save', array('as' => 'solution.aspect.order_save', 'uses' => 'Backend\SolutionController@aspect_order_save'));        
        Route::get('/aspect/delete/{aId}', array('as' => 'solution.aspect.delete', 'uses' => 'Backend\SolutionController@aspect_delete'));

        //keyfeature區
        Route::match(['get', 'post'], '/key_feature', array('as' => 'solution.key_feature', 'uses' => 'Backend\SolutionController@key_feature'));
        Route::match(['get', 'post'], '/key_feature/add', array('as' => 'solution.key_feature.add', 'uses' => 'Backend\SolutionController@addkey_feature'));
        Route::match(['get', 'post'], '/key_feature/edit/{key_featureid}', array('as' => 'solution.key_feature.edit', 'uses' => 'Backend\SolutionController@editkey_feature'));
        Route::post('/key_feature/order_save', array('as' => 'solution.key_feature.order_save', 'uses' => 'Backend\SolutionController@key_feature_order_save'));        
        Route::get('/key_feature/delete/{key_featureId}', array('as' => 'solution.key_feature.delete', 'uses' => 'Backend\SolutionController@key_feature_delete'));
    });

    //關於我們
    Route::group(['prefix' => 'about'], function(){
        //圖文區管理
        Route::match(['get', 'post'], '/content', array('as' => 'about.content', 'uses' => 'Backend\AboutController@content'));
        Route::match(['get', 'post'], '/content/edit/{aboutid}', array('as' => 'about.content.edit', 'uses' => 'Backend\AboutController@editcontent'));
        Route::post('/content/order_save', array('as' => 'about.content.order_save', 'uses' => 'Backend\AboutController@content_order_save'));
        
        //沿革標題
        Route::match(['get', 'post'], '/history_title', array('as' => 'about.history_title', 'uses' => 'Backend\AboutController@history_title'));

        //沿革維護
        Route::match(['get', 'post'], '/history', array('as' => 'about.history', 'uses' => 'Backend\AboutController@history'));
        Route::match(['get', 'post'], '/history/add', array('as' => 'about.history.add', 'uses' => 'Backend\AboutController@addhistory'));
        Route::match(['get', 'post'], '/history/edit/{historyid}', array('as' => 'about.history.edit', 'uses' => 'Backend\AboutController@edithistory'));
        Route::post('/history/order_save', array('as' => 'about.history.order_save', 'uses' => 'Backend\AboutController@history_order_save'));
        Route::get('/history/delete/{aId}', array('as' => 'about.history.delete', 'uses' => 'Backend\AboutController@history_delete'));

        //團隊維護
        Route::match(['get', 'post'], '/team', array('as' => 'about.team', 'uses' => 'Backend\AboutController@team'));
        Route::match(['get', 'post'], '/team/add', array('as' => 'about.team.add', 'uses' => 'Backend\AboutController@addteam'));
        Route::match(['get', 'post'], '/team/edit/{teamid}', array('as' => 'about.team.edit', 'uses' => 'Backend\AboutController@editteam'));
        Route::post('/team/order_save', array('as' => 'about.team.order_save', 'uses' => 'Backend\AboutController@team_order_save'));
        Route::get('/team/delete/{tId}', array('as' => 'about.team.delete', 'uses' => 'Backend\AboutController@team_delete'));
        
        //廠商維護
        Route::match(['get', 'post'], '/partner', array('as' => 'about.partner', 'uses' => 'Backend\AboutController@partner'));
        Route::match(['get', 'post'], '/partner/add', array('as' => 'about.partner.add', 'uses' => 'Backend\AboutController@addpartner'));
        Route::match(['get', 'post'], '/partner/edit/{partnerid}', array('as' => 'about.partner.edit', 'uses' => 'Backend\AboutController@editpartner'));
        Route::post('/partner/order_save', array('as' => 'about.partner.order_save', 'uses' => 'Backend\AboutController@partner_order_save'));
        Route::get('/partner/delete/{pId}', array('as' => 'about.partner.delete', 'uses' => 'Backend\AboutController@partner_delete'));
    });

    //產品管理
    Route::group(['prefix' => 'product'],function(){
        //產品網址驗證
        Route::get('url/validation',array('as' => 'product.url_validation','uses' => 'Backend\ProductController@url_validation'));
        //產品頁
        Route::match(['get', 'post'], '/index', array('as' => 'product.index', 'uses' => 'Backend\ProductController@index'));
        Route::match(['get', 'post'], '/add', array('as' => 'product.add', 'uses' => 'Backend\ProductController@add'));
        Route::match(['get', 'post'], '/edit/{productid}', array('as' => 'product.edit', 'uses' => 'Backend\ProductController@edit'));
        Route::post('/order_save', array('as' => 'product.order_save', 'uses' => 'Backend\ProductController@order_save'));
        Route::get('/delete/{aId}', array('as' => 'product.delete', 'uses' => 'Backend\ProductController@delete'));
    });

    //部落格
    Route::group(['prefix' => 'blog'],function(){
        //部落格類別維護
        Route::match(['get', 'post'], '/category', array('as' => 'blog.category', 'uses' => 'Backend\BlogCategoryController@index'));
        Route::match(['get', 'post'], '/category/add', array('as' => 'blog.category.add', 'uses' => 'Backend\BlogCategoryController@add'));
        Route::match(['get', 'post'], '/category/edit/{categoryid}', array('as' => 'blog.category.edit', 'uses' => 'Backend\BlogCategoryController@edit'));
        Route::get('/category/delete/{categoryid}', array('as' => 'blog.category.delete', 'uses' => 'Backend\BlogCategoryController@delete'));            

        //部落格維護
        Route::match(['get', 'post'], '/content', array('as' => 'blog.content', 'uses' => 'Backend\BlogController@index'));
        Route::match(['get', 'post'], '/content/add', array('as' => 'blog.content.add', 'uses' => 'Backend\BlogController@add'));        
        Route::match(['get', 'post'], '/content/edit/{blogid}', array('as' => 'blog.content.edit', 'uses' => 'Backend\BlogController@edit'));
        Route::match(['get', 'post'], '/content/Ajax/upload_summernote', array('as' => 'blog.content.upload_summernote', 'uses' => 'Backend\BlogController@upload_summernote'));        
        Route::get('/delete/{bId}', array('as' => 'blog.content.delete', 'uses' => 'Backend\BlogController@delete'));        
        Route::post('/content/order_save', array('as' => 'blog.content.order_save', 'uses' => 'Backend\BlogController@order_save'));
        
        //部落格評論
        Route::match(['get', 'post'], '/comment/{blogid}', array('as' => 'blog.comment', 'uses' => 'Backend\BlogCommentController@index'));      
        Route::match(['get', 'post'], '/comment/response/{commentid}', array('as' => 'blog.comment.response', 'uses' => 'Backend\BlogCommentController@response'));
    });

    //banner
    Route::group(['prefix' => 'banner'],function(){
        Route::match(['get', 'post'], '/index', array('as' => 'banner.index', 'uses' => 'Backend\BannerController@index'));
        Route::match(['get', 'post'], '/add', array('as' => 'banner.add', 'uses' => 'Backend\BannerController@add'));
        Route::match(['get', 'post'], '/edit/{bannerid}', array('as' => 'banner.edit', 'uses' => 'Backend\BannerController@edit'));
        Route::post('/order_save', array('as' => 'banner.order_save', 'uses' => 'Backend\BannerController@order_save'));
        Route::get('/delete/{bannerid}', array('as' => 'banner.delete', 'uses' => 'Backend\BannerController@delete'));
    });

    //首頁內文
    Route::group(['prefix' => 'homepage'],function(){
        //內文1
        Route::match(['get', 'post'], '/content1/edit/{content1id}', array('as' => 'content1.edit', 'uses' => 'Backend\Homepage\Content1Controller@edit'));        

        //內文2
        Route::match(['get', 'post'], '/content2/index', array('as' => 'content2.index', 'uses' => 'Backend\Homepage\Content2Controller@index'));
        Route::match(['get', 'post'], '/content2/add', array('as' => 'content2.add', 'uses' => 'Backend\Homepage\Content2Controller@add'));
        Route::match(['get', 'post'], '/content2/edit/{content2id}', array('as' => 'content2.edit', 'uses' => 'Backend\Homepage\Content2Controller@edit'));
        Route::post('/content2/order_save', array('as' => 'content2.order_save', 'uses' => 'Backend\Homepage\Content2Controller@order_save'));
        Route::get('/content2/delete/{content1id}', array('as' => 'content2.delete', 'uses' => 'Backend\Homepage\Content2Controller@delete'));

        //內文3
        Route::match(['get', 'post'], '/content3/index', array('as' => 'content3.index', 'uses' => 'Backend\Homepage\Content3Controller@index'));
        Route::match(['get', 'post'], '/content3/add', array('as' => 'content3.add', 'uses' => 'Backend\Homepage\Content3Controller@add'));
        Route::match(['get', 'post'], '/content3/edit/{content3id}', array('as' => 'content3.edit', 'uses' => 'Backend\Homepage\Content3Controller@edit'));
        Route::post('/content3/order_save', array('as' => 'content3.order_save', 'uses' => 'Backend\Homepage\Content3Controller@order_save'));
        Route::get('/content3/delete/{content1id}', array('as' => 'content3.delete', 'uses' => 'Backend\Homepage\Content3Controller@delete'));

        //內文4
        Route::match(['get', 'post'], '/content4/edit/{content4id}', array('as' => 'content4.edit', 'uses' => 'Backend\Homepage\Content4Controller@edit'));        
    });

    //聯絡我們
    Route::group(['prefix' => 'contact'],function(){
        //編輯聯絡我們
        Route::match(['get', 'post'], '/contact/edit/{contactid}', array('as' => 'contact.edit', 'uses' => 'Backend\ContactController@edit'));

        //聯絡我們信件
        Route::match(['get', 'post'], '/mail/index', array('as' => 'contact.contact_mail', 'uses' => 'Backend\ContactController@contact_mail'));        
        Route::match(['get', 'post'], '/mail/edit/{mailid}', array('as' => 'contact.show_mail', 'uses' => 'Backend\ContactController@show_mail'));        
        Route::get('/mail/delete/{mailid}', array('as' => 'contact.delete_mail', 'uses' => 'Backend\ContactController@delet_mail'));

        //聯絡我們的信箱編輯
        Route::match(['get', 'post'], '/email/index', array('as' => 'contact.email_index', 'uses' => 'Backend\ContactController@email_index'));
        Route::match(['get', 'post'], '/email/add', array('as' => 'contact.email_add', 'uses' => 'Backend\ContactController@email_add'));
        Route::match(['get', 'post'], '/email/edit/{emailid}', array('as' => 'contact.email_edit', 'uses' => 'Backend\ContactController@email_edit'));        
        Route::get('/email/delete/{emailid}', array('as' => 'contact.email_delete', 'uses' => 'Backend\ContactController@email_delete'));

        //回覆信件
        Route::match(['get', 'post'], '/mail/response_mail/{mailid}', array('as' => 'contact.response_mail', 'uses' => 'Backend\ContactController@response_mail'));                
    });

    //隱私權
    Route::group(['prefix' => 'privacy'],function(){
        //大綱
        Route::match(['get', 'post'], '/index/edit', array('as' => 'privacy.index', 'uses' => 'Backend\PrivacyController@index'));

        //條款
        Route::match(['get', 'post'], '/term/index', array('as' => 'term.index', 'uses' => 'Backend\PrivacyController@term'));
        Route::match(['get', 'post'], '/term/add', array('as' => 'term.add', 'uses' => 'Backend\PrivacyController@add_term'));
        Route::match(['get', 'post'], '/term/edit/{termid}', array('as' => 'term.edit', 'uses' => 'Backend\PrivacyController@edit_term'));
        Route::post('/term/order_save', array('as' => 'term.order_save', 'uses' => 'Backend\PrivacyController@order_save_term'));
        Route::get('/term/delete/{termid}', array('as' => 'term.delete', 'uses' => 'Backend\PrivacyController@delete_term'));
    });

    //條款
    Route::group(['prefix' => 'term'],function(){
        //大綱
        Route::match(['get', 'post'], '/index/edit', array('as' => 'term', 'uses' => 'Backend\TermController@index'));
    });
    
    //權限管理
    Route::group(['prefix' => 'admin'], function(){
        Route::match(['get', 'post'], '/auth', array('as' => 'admin.auth', 'uses' => 'Backend\AdminController@auth'));
        Route::match(['get', 'post'], '/auth/add', array('as' => 'admin.auth.add', 'uses' => 'Backend\AdminController@addauth'));
        Route::match(['get', 'post'], '/auth/edit/{authid}', array('as' => 'admin.auth.edit', 'uses' => 'Backend\AdminController@editauth'));
        Route::get('auth/delete/{authid}', array('as' => 'admin.auth.delete', 'uses' => 'Backend\AdminController@deleteauth'));
    });
});