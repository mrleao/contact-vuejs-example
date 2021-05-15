<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/contato', function () {
    return Inertia::render('Contacts');
})->name('contacts');

Route::get('/lista-contatos', [ContactsController::class, 'index'])->name('list.contacts');
Route::post('/contatos', [ContactsController::class, 'store'])->name('post.contacts');



