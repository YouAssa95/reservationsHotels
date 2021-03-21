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
Route::get('/', [Controller::class, 'welcome'])->name('accueil');
Route::get('/entrerUnHotel', [Controller::class, 'entrerUnHotel'])->name('entrerUnHotel');
Route::post('/entrerUnHotel', [Controller::class, 'registerUnHotel'])->name('registerUnHotel.post');
Route::get('/entrerUneChambre', [Controller::class, 'entrerUneChambre'])->name('entrerUneChambre');
Route::post('/entrerUneChambre', [Controller::class, 'registerUneChambre'])->name('registerUneChambre.post');

Route::get('/trouverUnHotel', [Controller::class, 'trouverUnHotel'])->name('trouverUnHotel');
Route::post('/trouverUnHotel', [Controller::class, 'trouverUnHotelResults'])->name('trouverUnHotel.post');

Route::get('/aboutUs', [Controller::class, 'aboutUs'])->name('aboutUs');
Route::get('/hotels', [Controller::class, 'hotels'])->name('hotels');

Route::get('/login', [Controller::class, 'showLoginForm'])->name('login');
Route::post('/login', [Controller::class, 'login'])->name('login.post');

Route::get('/register/client', [Controller::class, 'showRegisterForm'])->name('register');
Route::post('/register/client', [Controller::class, 'registerClient'])->name('register.post');

Route::get('/logout', [Controller::class, 'logout'])->name('logout');




Route::get('/contact', [Controller::class, 'showContactForm'])->name('contact');
Route::post('/contact', [Controller::class, 'contact'])->name('contact.post');

Route::get('/hotels/{NumHotel}', [Controller::class, 'showHotel'])->where('NumHotel', '[0-9]+')->name('hotels.show');

// Reservations

Route::get('/reservation', [Controller::class, 'showReservationForm'])->name('reservation.show');
Route::post('/reservation', [Controller::class, 'storeReservation'])->name('reservation.post');

Route::get('/profil', [Controller::class, 'showProfil'])->name('profil');

