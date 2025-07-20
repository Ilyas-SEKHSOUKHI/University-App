<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;


Route::get('/home', function () {
    return view('home');
})->middleware('auth');


Route::get('/login', [AuthManager::class , 'login'])->name('login');
Route::post('/login', [AuthManager::class , 'loginPost'])->name('login.post');
Route::get('/registration',[AuthManager::class , 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class , 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class , 'logout'])->name('logout');
Route::get('/cours', [AuthManager::class , 'cours'])->name('cours');
Route::get('/notes', [AuthManager::class , 'notes'])->name('notes');
Route::get('/profile', [AuthManager::class , 'profile'])->name('profile');
Route::get('/messagerie', [AuthManager::class , 'messagerie'])->name('messagerie');
Route::get('/DocDemande', [AuthManager::class , 'DocDemande'])->middleware('auth')->name('DocDemande');
Route::post('/DocDemande', [AuthManager::class , 'DocDemandePost'])->middleware('auth')->name('DocDemande.post');
Route::get('/home', [AuthManager::class , 'home'])->middleware('auth')->name('home');
Route::get('/inscription', [AuthManager::class , 'inscription'])->middleware('auth')->name('inscription');
Route::post('/inscription', [AuthManager::class , 'inscriptionPost'])->middleware('auth')->name('inscription.post');
Route::get('/fiche_inscription', [AuthManager::class , 'fiche_inscription'])->middleware('auth')->name('fiche_inscription');
Route::get('/fiche-inscription/pdf/{id}', [AuthManager::class, 'fiche_inscription_pdf'])->name('fiche_inscription.pdf');





