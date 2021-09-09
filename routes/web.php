<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// The Client & Contacts module
Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    'prefix' => 'admin',
    'name' => 'admin.',
], function() {
    // Clients (protected by global scope 'UserScope')
    Route::resource('clients', App\Http\Controllers\ClientsController::class);

    // Contacts
    Route::get('contacts/', [App\Http\Controllers\ContactsController::class, 'index']);
    Route::get('contacts/{contact}', [App\Http\Controllers\ContactsController::class, 'show']);
    Route::get('/contacts/{contact}/edit', [App\Http\Controllers\ContactsController::class, 'edit']);
    Route::put('/contacts/{contact}', [App\Http\Controllers\ContactsController::class, 'update']);
    Route::delete('/contacts/{contact}', [App\Http\Controllers\ContactsController::class, 'delete']);

    // Contacts scoped to Client
    Route::get('/clients/{client}/contacts', [App\Http\Controllers\ClientContactsController::class, 'index']);
    Route::get('/clients/{client}/contacts/new', [App\Http\Controllers\ClientContactsController::class, 'create']);
    Route::post('/clients/{client}/contacts', [App\Http\Controllers\ClientContactsController::class, 'store']);
});
