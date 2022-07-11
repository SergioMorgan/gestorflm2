<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\ShowSites;
use App\Http\Livewire\ShowUsers;
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

// Route::get('/prueba', function () {
//     return view('prueba');
// })->name('prueba');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

// esta ruta de tipo resource va a reemplazar a todas las 7 definiciones CRUD
// siempre y cuando  hayamos seguido la convencion de nombres singular/plural
// y tengamos las vistas en un mismo directorio con los nombres create/edit/index/show

// Route::resource('sites', SiteController::class);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::resource('sites', SiteController::class);
// });
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('dashboard',                \App\Http\Livewire\ShowDashboard::class)                ->name('dashboard.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('sites',                    \App\Http\Livewire\sites\ShowSites::class)              ->name('sites.index');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('sites/create',             \App\Http\Livewire\sites\CreateSites::class)            ->name('sites.create');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('sites/{item}/edit',        \App\Http\Livewire\sites\CreateSites::class)            ->name('sites.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('ostickets',                \App\Http\Livewire\ostickets\ShowOstickets::class)      ->name('ostickets.index');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('ostickets/create',         \App\Http\Livewire\ostickets\CreateOstickets::class)    ->name('ostickets.create');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('ostickets/{item}/edit',    \App\Http\Livewire\ostickets\EditOstickets::class)      ->name('ostickets.edit');

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('sites/{$site}', CreateSites::class)->name('sites.create');
// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('users', ShowUsers::class)->name('users.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::resource('users', UserController::class);
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Route::get('prueba', function() {
//     return 'Has accedido correctamente a la pagina de prueba';
// })->middleware(['age', 'auth:sanctum']);

// Route::get('no-autorizado', function() {
//     return 'No eres mayor de edad';
// });