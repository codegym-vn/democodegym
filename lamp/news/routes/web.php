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

Route::get('/', "ArticleController@index")->name("articles.list");
Route::get('/new', "ArticleController@showNewForm")->name("articles.newForm");
Route::post('/new', "ArticleController@create")->name("articles.create");
Route::get('/{id}', "ArticleController@show")->name("articles.show");
Route::post('/{id}/delete', "ArticleController@delete")->name("articles.delete");
