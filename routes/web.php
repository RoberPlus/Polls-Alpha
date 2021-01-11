<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'IndexController@index')->name('home');

// Votaciones

Route::get('/polls', 'PollController@index')->name('polls.index');
Route::get('/polls/create', 'PollController@create')->name('polls.create');
Route::post('/polls', 'PollController@store')->name('polls.store');
Route::get('/polls/{id}', 'PollController@show')->name('polls.show');

// Admin
Route::delete('/polls/{id}', 'AdminPollController@delete')->name('polls.destroy');
Route::put('/polls/{id}/change', 'AdminPollController@update')->name('polls.update');

// Votar
Route::post('/polls/{id}', 'PollController@vote')->name('polls.vote');

// Panel Admin Votaciones
Route::get('/admin/polls', 'AdminPollController@index')->name('adminPoll.index');




