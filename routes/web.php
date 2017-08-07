<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas 
| Las rutas son cargadas por el RouteServiceProvider dentro de un grupo que 
| Contiene el grupo de middleware "web". ¡Ahora crea algo grande!
|
*/



// Basico
Route::get('foo',function(){
    return 'Hola mundo';
});

// End basico

// Parametros
#parametro opciones
Route::get('car/toyota/{name?}',function($name = 'Julio'){
    return $name;
});
# expresiones regulares
Route::get('user/nombre/{name}',function($name){
    return $name;
})->where('name','[A-Za-z]+');
//End Parametros

// Denominar Route
Route::get('user/profile', function(){
    return 'user profile';
})->name('profile');
// End Denominar Route

// middleware
Route::get('user/middleware', function(){
    return 'user middlware';
})->middleware('age');

// End middleware

// Controller 
    Route::get('facebook', 'Facebook');
    Route::get('facebook/group', 'FacebookGroup@index');

    Route::get('manga','MangaController@index');

    Route::get('/manga/create','MangaController@create');
    Route::post('/manga/store','MangaController@store');
// End Controller


Route::get('/home', 'HomeController@index')->name('home');

/*Proyecto Platzi
*/

Auth::routes();

Route::group(['middlware' =>'auth'], function(){
    Route::post('/{username}/dms', 'UsersController@sendPrivateMessage');
    Route::post('/message/create','MessageController@create');
    Route::post('{username}/follow','UsersController@follow');
    Route::post('{username}/unfollow','UsersController@unfollow');
    Route::get('/conversations/{conversation}','UsersController@showConversation');
    Route::get('/api/notifications', 'UsersController@notifications');
});
Route::get('/messages/{message}','MessageController@show');
Route::get('/messages','MessageController@search');
Route::get('/auth/facebook','SocialAuthController@facebook');
Route::get('/auth/facebook/callback','SocialAuthController@callback');
Route::post('/auth/facebook/register','SocialAuthController@register');

Route::get('/', 'PagesController@home');
Route::get('/user/{username}','UsersController@show');
Route::get('/user/{username}/follows','UsersController@follows');
Route::get('/user/{username}/followers','UsersController@followers');
Route::get('/api/messages/{message}/responses','MessageController@responses');

/*Proyecto Laraveles*/
Route::get('/laraveles', function () {
    return view('home');
});

Route::post('/departure/create', 'DepartureController@create')->name('departurecreate');