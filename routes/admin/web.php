<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth.admin'], function () {

    /************************************ General Route ************************************/
    //Home
    Route::get('/', ['as' => 'admin.home.index', 'uses' => 'HomeController@index']);

    //Slider
    Route::resource('slider', 'SliderController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/slider/{slider}', ['as' => 'admin.slider.destroy', 'uses' => 'SliderController@destroy']);

    //Tag
    Route::resource('tag', 'TagController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/tag/{tag}', ['as' => 'admin.tag.destroy', 'uses' => 'TagController@destroy']);

    //About US
    Route::get('/about', ['as' => 'admin.about.edit', 'uses' => 'AboutController@edit']);
    Route::patch('/about', ['as' => 'admin.about.update', 'uses' => 'AboutController@update']);

    //Contact US
    Route::get('/contact', ['as' => 'admin.contact.edit', 'uses' => 'ContactController@edit']);
    Route::patch('/contact', ['as' => 'admin.contact.update', 'uses' => 'ContactController@update']);

    //Faq
    Route::resource('faq', 'FaqController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/faq/{faq}', ['as' => 'admin.faq.destroy', 'uses' => 'FaqController@destroy']);

    //News
    Route::resource('news', 'NewsController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/news/{news}', ['as' => 'admin.news.destroy', 'uses' => 'NewsController@destroy']);

    //News Category
    Route::resource('newsCategory', 'NewsCategoryController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/newsCategory/{newsCategory}', ['as' => 'admin.newsCategory.destroy', 'uses' => 'NewsCategoryController@destroy']);

    //Newsletter
    Route::resource('newsletter', 'NewsletterController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/newsletter/{newsletter}', ['as' => 'admin.newsletter.destroy', 'uses' => 'NewsletterController@destroy']);
    Route::get('/export/excel/newsletter', ['as' => 'admin.newsletter.export', 'uses' => 'NewsletterController@export']);

    //Article
    Route::resource('article', 'ArticleController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/article/{article}', ['as' => 'admin.article.destroy', 'uses' => 'ArticleController@destroy']);

    //Article Category
    Route::resource('articleCategory', 'ArticleCategoryController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/articleCategory/{articleCategory}', ['as' => 'admin.articleCategory.destroy', 'uses' => 'ArticleCategoryController@destroy']);

    //Ticket
    Route::resource('ticket', 'TicketController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/ticket/{ticket}', ['as' => 'admin.ticket.destroy', 'uses' => 'TicketController@destroy']);

    //Message
    Route::post('/reply/message/email/{message}', ['as' => 'admin.message.reply', 'uses' => 'MessageController@reply']);
    Route::resource('message', 'MessageController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/message/{message}', ['as' => 'admin.message.destroy', 'uses' => 'MessageController@destroy']);

    //Comment
    Route::resource('comment', 'CommentController', ['as' => 'admin', 'except' => 'destroy']);
    Route::get('/destroy/comment/{comment}', ['as' => 'admin.comment.destroy', 'uses' => 'CommentController@destroy']);

    //Profile
    Route::get('/profile/info', ['as' => 'admin.profile.index', 'uses' => 'ProfileController@index']);
    Route::patch('/profile/info/update', ['as' => 'admin.profile.update', 'uses' => 'ProfileController@updateInfo']);
    Route::patch('/profile/password/change', ['as' => 'admin.profile.update.password', 'uses' => 'ProfileController@updatePassword']);

    //User
    Route::get('/user/del/{user}', ['as' => 'admin.user.del', 'uses' => 'UserController@del']);
    Route::resource('user', 'UserController', ['as' => 'admin']);


    Route::group(['middleware' => 'admin_role:super_admin'], function () {

        /*
        Route::resource('admins', 'AdminsController', ['as' => 'admin']);
        Route::post('/admins/delete', ['as' => 'admin.admins.delete', 'uses' => 'AdminsController@delete']);
        Route::post('/admins/reset/password', ['as' => 'admin.admins.resetPassword', 'uses' => 'AdminsController@resetPassword']);
        */

        //Admin
        Route::resource('admin', 'AdminController', ['as' => 'admin', 'except' => 'destroy']);
        Route::get('/destroy/admin/{admin}', ['as' => 'admin.admin.destroy', 'uses' => 'AdminController@destroy']);


        //Role
        Route::resource('role', 'RoleController', ['as' => 'admin']);
        Route::get('/destroy/role/{role}', ['as' => 'admin.role.destroy', 'uses' => 'RoleController@destroy']);
        //Route::post('/role/delete', ['as' => 'admin.role.delete', 'uses' => 'RoleController@delete']);
    });


    /************************************ Private Route ************************************/
    //...

});


Route::group(['namespace' => 'Admin\Auth', 'prefix' => 'admin'], function () {

    Route::get('/login', ['as' => 'admin.auth.login_form', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'admin.auth.login', 'uses' => 'LoginController@login']);
    Route::get('/logout', ['as' => 'admin.auth.logout', 'uses' => 'LoginController@logout']);


    /* These are for laravel*/

    /*
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    */


});

