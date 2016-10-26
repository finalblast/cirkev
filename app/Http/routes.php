<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'PostsController@index');
Route::get('online','PagesController@online');
Route::get('megabalik-krestapnskych-knih', 'PagesController@megabalik');
Route::get('zamyslenia/{slug?}' , 'VersController@index');
Route::get('kategorie/{slug}' , 'GroupController@index');


Route::group(['middleware' => 'auth'], function() {

    Route::get  ('kategorie', 'GroupController@createNewGroup');
    Route::post ('kategorie', 'GroupController@store');

    Route::get ('kategorie/{id}', 'AdminController@newsConfirmed');



    Route::get  ('post/create', 'PostsController@create');
    Route::post('post', 'PostsController@store');
    Route::get('post/{id}/edit', [ 'as' => 'post.edit', 'uses' => 'PostsController@edit']);
    Route::get('post/{id}/delete', [ 'as' => 'post.delete', 'uses'=> 'PostsController@delete']);
    Route::put('post/{id}/update', ['as'=>'post.update', 'uses'=>'PostsController@update'] );
    Route::delete('post/{id}/delete', [ 'as' => 'post.destroy', 'uses'=> 'PostsController@destroy']);


    Route::get('user/{id}/edit', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
    Route::put('user/{id}/update', ['as'=>'user.update', 'uses'=>'UserController@update'] );
    Route::get('comment/{id}/delete', 'CommentsController@destroy');

    Route::get ('admin', 'AdminController@indexUsers');

});
Route::auth();

Route::get('/', ['as' => 'search.index', 'uses' => 'PostsController@index'] );

Route::get('user', 'UserController@index');
Route::get('user/{slug}', ['as' => 'user.show', 'uses' => 'UserController@show']);
Route::get('tag/{slug}' , 'TagController@index');
Route::resource('comment', 'CommentsController', [ 'only' => ['show', 'store']] );
Route::get('{slug}' , [ 'as' => 'post.show', 'uses'=> 'PostsController@show']);

Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::post('contact', ['as' => 'contact_store', 'uses' => 'PagesController@contact_store']);
Route::post('xxx', 'ImagesController@store');
//Route::post('images', ['as' => 'images', 'uses' => 'ImagesController@store']);
Route::post('contactuser/{id}', ['as' => 'contactStoreUser', 'uses' => 'PagesController@contactStoreUser']);





//Route::resource('post', 'PostsController', [ 'except' => [ 'show' ] ]);

//Route::get('auth/{service}' , 'Auth\AuthController@redirectToProvider');
//->where('service' , '(github|facebook)');
//Route::get('auth/{service}/callback' , 'Auth\AuthController@handleProviderCallback');




//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);



//Route::get('/email', function () {
//
//    $data = array(
//        'name' => "Správa z webu Cirkev online.sk",
//    );
//
//    Mail::send('emails.welcome', $data, function ($message) {
//
//        $message->from('admin@cirkevonline.sk', 'Learning Laravel');
//
//        $message->to('gajdosgabo@gmail.com')->subject('Learning Laravel test email');
//
//    });
//
//    return "Your email has been sent successfully";
//
//});
//



