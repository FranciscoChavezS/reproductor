<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

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

//Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/video', [App\Http\Controllers\VideoController::class, 'index'])->name('video');

/* Route::get('/playlist', [App\Http\Controllers\PlaylistController::class, 'index'])->name('playlist');
 */
 
//proteger lar páginas que no puedan acceder al menú sin log in con middleware auth
Route::group(['middleware' => 'auth'], function() { 
    
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::resource('posts', App\Http\Controllers\PostController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil');
    Route::post('/perfil', [App\Http\Controllers\PerfilController::class, 'update_avatar'])->name('profile');
    Route::get('/video', [App\Http\Controllers\VideoController::class, 'index'])->name('video');
    
});
