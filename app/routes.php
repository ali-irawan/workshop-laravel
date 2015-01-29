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


Route::group(array('before' => 'auth'), function()
{

		Route::get('/', function()
		{
			return View::make('index');
		});

		/*
		   contact 			GET   	ContactController@index
		   contact  		POST 	ContactController@store
		   contact/{id}		PUT 	ContactController@update
		   contact/{id}		DELETE  ContactController@destroy
		*/
		Route::resource('api/contact','ContactController');

		Route::get('/gallery', 'GalleryController@index');
		Route::post('/gallery', 'GalleryController@upload');

		Route::get('/chart', function(){

			return View::make("chart");
		});
    
});


Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/logout', function(){
	
	Auth::logout();
	return Redirect::to('/');
});	