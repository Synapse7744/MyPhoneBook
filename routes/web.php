<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CollaborateurController;
use App\http\Models\Company;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/* ---------- ROUTES ENTREPRISES -------------- */

Route::get('/entreprise/seek', [CompanyController::class, 'seek'])->name('compseek');
Route::get('/entreprise/index/{id}', [CompanyController::class, 'index']);
Route::get('/entreprise/create', [CompanyController::class, 'create']);
Route::get('/entreprise/store', [CompanyController::class, 'store']);
Route::get('/entreprise/updatebranch', function () {
    return view('company.updatebranch');
});
Route::get('/entreprise/updatechoice', [CompanyController::class, 'updatechoice']);
Route::get('/entreprise/update/{id}', [CompanyController::class, 'update']);
Route::get('/entreprise/edit/{id}', [CompanyController::class, 'edit']);
Route::get('/entreprise/deletebranch', function () {
    return view('company.deletebranch');
});
Route::get('/entreprise/deletechoice', [CompanyController::class, 'deletechoice']);
Route::get('/entreprise/delete/{id}', [CompanyController::class, 'destroy']);
Route::get('/entreprise/{id}', [CompanyController::class, 'show']);


/* ------------ ROUTES COLLABORATEURS --------------- */

Route::get('/collaborateur/seek', [CollaborateurController::class, 'seek'])->name('collseek');
Route::get('/collaborateur/index/{id}', [CollaborateurController::class, 'index']);
Route::get('/collaborateur/create', [CollaborateurController::class, 'create']);
Route::get('/collaborateur/store', [CollaborateurController::class, 'store']);
Route::get('/collaborateur/updatebranch', function () {
    return view('collaborateur.updatebranch');
});
Route::get('/collaborateur/updatechoice', [CollaborateurController::class, 'updatechoice']);
Route::get('/collaborateur/update/{id}', [CollaborateurController::class, 'update']);
Route::get('/collaborateur/edit/{id}', [CollaborateurController::class, 'edit']);
Route::get('/collaborateur/deletebranch', function () {
    return view('collaborateur.deletebranch');
});
Route::get('/collaborateur/deletechoice', [CollaborateurController::class, 'deletechoice']);
Route::get('/collaborateur/delete/{id}', [CollaborateurController::class, 'destroy']);
Route::get('/collaborateur/{id}', [CollaborateurController::class, 'show']);
require __DIR__.'/auth.php';
