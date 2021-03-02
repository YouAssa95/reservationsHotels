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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
Route::get('/', [Controller::class, 'showRanking'])->name('ranking.show');
Route::get('/teams/{teamId}', [Controller::class, 'showTeam'])->where('teamId', '[0-9]+')->name('teams.show');
Route::get('/teams/create', [Controller::class, 'createTeam'])->name('teams.create');
Route::post('/teams', [Controller::class, 'storeTeam'])->name('teams.store');
Route::get('/matches/create', [Controller::class, 'createMatch'])->name('matches.create');
Route::post('/matches', [Controller::class, 'storeMatch'])->name('matches.store');
Route::post('/wahaby', [Controller::class, 'storeMatch'])->name('team');
=======
Route::get('/', [Controller::class, 'welcome'])->name('accueil');
Route::get('/entrerUnHotel', [Controller::class, 'entrerUnHotel'])->name('entrerUnHotel');
Route::get('/trouverUnHotel', [Controller::class, 'trouverUnHotel'])->name('trouverUnHotel');
Route::get('/aboutUs', [Controller::class, 'aboutUs'])->name('aboutUs');
Route::get('/hotels', [Controller::class, 'hotels'])->name('hotels');

Route::get('/login', [Controller::class, 'showLoginForm'])->name('login');
Route::post('/login', [Controller::class, 'login'])->name('login.post');

Route::get('/contact', [Controller::class, 'showContactForm'])->name('contact');
Route::post('/contact', [Controller::class, 'contact'])->name('contact.post');

Route::get('/hotels/{NumHotel}', [Controller::class, 'showHotel'])->where('NumHotel', '[0-9]+')->name('hotels.show');
>>>>>>> 4ce86a34ee739891db170de9562230b148d4402d
