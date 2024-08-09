<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\MainController;
use Spatie\Permission\Models\Role;

// Main Page Route
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('role', function () {
    Role::create(['name' => 'admin']);
    Role::create(['name' => 'user']);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('/');
    })->name('dashboard');
    Route::middleware(['role:admin'])->group(function () {
        Route::get('add/drugs', [MainController::class, 'addDrugsForm'])->name('drug-add-form');
        Route::post('import/drugs', [MainController::class, 'importDrugs'])->name('drug-add-import');
        Route::get('user/list', [MainController::class, 'userList'])->name('user-list');
        Route::get('user/get', [MainController::class, 'userGetAll'])->name('user-get-all');
        Route::post('user/add_new', [MainController::class, 'userAddNew'])->name('user-add-new');
        Route::post('user/delete', [MainController::class, 'userDelete'])->name('user-delete');
    });
    Route::get('/', [MainController::class, 'search'])->name('pages-home');
    Route::post('/drugs', [MainController::class, 'searchDrugs'])->name('drug-search');
});