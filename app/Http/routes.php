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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

// Route::controllers([
	// 'auth' => 'Auth\AuthController',
	// 'password' => 'Auth\PasswordController',
// ]);

Route::post('/auth/register', 'AuthController@registerUser');
Route::post('/auth/login', 'AuthController@loginUser');
Route::get('/auth/logout', 'AuthController@logoutUser');

Route::get('login', function() {
	return view('pages.login');
});

Route::get('products/all-products', 'ProductController@allProducts');
Route::get('search', 'ProductController@search');
// these route functions are temporarily placed in ProductController
Route::get('category/sub-categories', 'ProductController@subCats');
Route::get('category/post-sub-cats', 'ProductController@postSubCats');
Route::post('category', ['uses' => 'ProductController@createCat', 'as' => 'category.store']);
Route::post('sub-category', ['uses' => 'ProductController@createSubCat', 'as' => 'subcat.store']);
Route::post('post-sub-cat', ['uses' => 'ProductController@createPostSubCat', 'as' => 'postsubcat.store']);

Route::get('cart', function() {
	return view('pages.cart');
});

Route::get('register', function() {
	return view('pages.register');
});

Route::get('adpost', function() {
	return view('pages.adpost');
});

Route::resource('products', 'ProductController');

Route::get('admin/{page?}', 'AdminController@recieve');

Route::get('test', function() {
//	return view('pages.test');
    $response = new Response('asd', 422);
    throw new App\Exceptions\LoginException($response);
});

