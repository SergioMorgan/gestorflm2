<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('dashboard',                \App\Http\Livewire\ShowDashboard::class)                ->name('dashboard.index');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('users',                    \App\Http\Livewire\Users\ShowUsers::class)              ->name('users.index');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('users/create',             \App\Http\Livewire\Users\CreateUser::class)             ->name('users.create');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('users/{item}/edit',        \App\Http\Livewire\Users\CreateUser::class)             ->name('users.edit');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('sites',                    \App\Http\Livewire\Sites\ShowSites::class)              ->name('sites.index');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('sites/create',             \App\Http\Livewire\Sites\CreateSites::class)            ->name('sites.create');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('sites/{item}/edit',        \App\Http\Livewire\Sites\CreateSites::class)            ->name('sites.edit');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('ostickets',                \App\Http\Livewire\Ostickets\ShowOstickets::class)      ->name('ostickets.index');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('ostickets/create',         \App\Http\Livewire\Ostickets\CreateOstickets::class)    ->name('ostickets.create');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('ostickets/{item}/edit',    \App\Http\Livewire\Ostickets\EditOstickets::class)      ->name('ostickets.edit');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('ostickets/excel/export',  '\App\Http\Livewire\ostickets\ShowOstickets@export')      ->name('ostickets.export');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->get('sites/excel/export',       '\App\Http\Livewire\sites\ShowSites@export')      ->name('sites.export');
