<?php
Route::group(['namespace' => 'Front'], function () {
    Route::get('/', ['as' => 'front.home.index', 'uses' => 'HomeController@index']);
    Route::get('/ajaxLoad', ['as' => 'front.ajax.load_more', 'uses' => 'HomeController@load_more']);

    //Contact us
    Route::get('/contact-us', ['as' => 'front.contact.index', 'uses' => 'ContactController@index']);
    Route::post('/contact-us', ['as' => 'front.contact.storeAjax', 'uses' => 'ContactController@storeAjax']);


    //About us
    Route::get('/about-us', ['as' => 'front.about.index', 'uses' => 'AboutController@index']);

    //Faq
    Route::get('/faq', ['as' => 'front.faq.index', 'uses' => 'FaqController@index']);

    //Search
    Route::get('/in/search', ['as' => 'front.search.index', 'uses' => 'SearchController@index']);

    //Article
    Route::get('/articles', ['as' => 'front.article.index', 'uses' => 'ArticleController@index']);
    Route::post('/articles/ajax', ['as' => 'front.article.ajax', 'uses' => 'ArticleController@ajax']);
    Route::get('/articles/{article}/{title?}', ['as' => 'front.article.show', 'uses' => 'ArticleController@show']);

    //News
    Route::get('/news', ['as' => 'front.news.index', 'uses' => 'NewsController@index']);
    Route::post('/news/ajax', ['as' => 'front.news.ajax', 'uses' => 'NewsController@ajax']);
    Route::get('/news/{news}/{title?}', ['as' => 'front.news.show', 'uses' => 'NewsController@show']);


    //Newsletter
    Route::post('/newsletter', ['as' => 'front.newsletter.store', 'uses' => 'NewsletterController@store']);


});

Route::group(['namespace' => 'Front\Auth'], function () {
    Route::post('/login', ['as' => 'front.auth.login', 'uses' => 'AuthController@login']);
    Route::post('/register', ['as' => 'front.auth.register', 'uses' => 'AuthController@register']);
    Route::get('/logout', ['as' => 'front.auth.logout', 'uses' => 'AuthController@logout']);
});