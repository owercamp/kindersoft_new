<?php

use App\Http\Controllers\GeneralInformationController;
use App\Livewire\Configurations\GeneralInformation;
use App\Livewire\TaxInformation;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Livewire::setScriptRoute(function ($handle){
  return Route::get('/kindersoft_new/public/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle){
  return Route::get('/kindersoft_new/public/livewire/update', $handle);
});

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/general-information', GeneralInformation::class)->name('general-information');
    Route::post('/general-information', [GeneralInformationController::class, 'store'])->name('general-information.store');
    Route::get('/tax-information', TaxInformation::class)->name('tax-information');
});
