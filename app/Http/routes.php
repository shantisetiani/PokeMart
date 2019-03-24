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

Route::get('/', 'UserController@GetDate');

Route::get('/Login', function () {
    return view('login');
});

Route::post('/Login', 'UserController@Login');

Route::get('/Logout','UserController@Logout');

Route::get('/Register', function () {
    return view('register');
});

Route::post('/Register', 'UserController@Register');

Route::get('/Profile', function () {
    return view('member.profile');
});

Route::get('/Cart', 'TransactionController@GetAllActiveCart');
Route::post('/AddToCart', 'TransactionController@AddToCart');
Route::post('/DeleteCart', 'TransactionController@DeleteCart');
Route::post('/AddToTransaction', 'TransactionController@AddToTransaction');

Route::post('/Comment', 'CommentController@InsertComment');



Route::post('/EditUser', 'UserController@EditProfile');

Route::get('/PokemonList', 'PokemonController@GetAllPokemon');

Route::post('/SearchPokemon', 'PokemonController@SearchPokemon');

Route::get('/InsertPokemon', 'PokemonController@ShowInsertPokemonPage');

Route::post('/InsertPokemon', 'PokemonController@InsertPokemon');

Route::get('/PokemonList', 'PokemonController@GetAllPokemon');

Route::get('/PokemonDetail', 'PokemonController@GetPokemonById');

Route::get('/UpdatePokemon', 'PokemonController@GetPokemonById');

Route::post('/UpdatePokemon', 'PokemonController@UpdatePokemon');

Route::post('/DeletePokemon', 'PokemonController@DeletePokemon');

Route::get('/InsertElement', function () {
    return view('admin.insertElement');
});

Route::post('/InsertElement', 'PokemonController@InsertElement');

Route::get('/UpdateElement', 'PokemonController@ShowUpdateElementPage');
Route::get('/GetElementById', 'PokemonController@GetElementById');
Route::post('/UpdateElement', 'PokemonController@UpdateElement');

Route::get('/UpdateUser', 'UserController@ShowUpdateUserPage');
Route::get('/GetUserById', 'UserController@GetUserById');
Route::post('/UpdateUser', 'UserController@UpdateUser');

Route::get('/DeleteUser', 'UserController@ShowDeleteUserPage');
Route::post('/DeleteUser', 'UserController@DeleteUser');

Route::get('/UpdateTransaction', 'TransactionController@ShowUpdateTransactionPage');
Route::post('/Accept', 'TransactionController@AcceptTransaction');
Route::post('/Decline', 'TransactionController@DeclineTransaction');
Route::get('/DetailTransaction', 'TransactionController@GetDetailTransaction');

Route::get('/DeleteTransaction', 'TransactionController@ShowDeleteTransactionPage');
Route::post('/DeleteTransaction', 'TransactionController@DeleteTransaction');