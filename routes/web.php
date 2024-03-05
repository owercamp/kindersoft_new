<?php

use Livewire\Livewire;
use App\Exceptions\Handler;
use App\Http\Controllers\HandlingPDF;
use App\Livewire\Informations\Regime;
use Illuminate\Support\Facades\Route;
use App\Livewire\Informations\CorporateImages;
use App\Livewire\Configurations\TaxInformation;
use App\Livewire\Configurations\GeneralInformation;
use App\Http\Controllers\GeneralInformationController;

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

Livewire::setScriptRoute(function ($handle) {
  if (config('app.env') === 'prod') {
    return Route::get('/kindersoft/livewire/livewire.js', $handle);
  } else {
    return Route::get('/kindersoft_new/public/livewire/livewire.js', $handle);
  }
});

Livewire::setUpdateRoute(function ($handle) {
  if (config('app.env') === 'prod') {
    return Route::get('/kindersoft/livewire/update', $handle);
  } else {
    return Route::get('/kindersoft_new/public/livewire/update', $handle);
  }
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
  Route::get('/regime-type', Regime::class)->name('regime-type');
  Route::get('/corporate-images', CorporateImages::class)->name('corporate-images');
  Route::get('/downloadPDF-commercial', [HandlingPDF::class, 'pdf_commercial'])->name('downloadCommercial');
  Route::get('downloadPDF-coperative',[HandlingPDF::class, 'pdf_cooperative'])->name('downloadCooperative');
  Route::get('/downloadPDF-legal',[HandlingPDF::class, 'pdf_legal'])->name('downloadLegal');
  Route::get('/downloadPDF-authorization', [HandlingPDF::class, 'pdf_authorization'])->name('downloadAuthorization');
  Route::get('/downloadPDF-indefinite-term-contract',[HandlingPDF::class, 'pdf_indefinite_term_contract'])->name('downloadIndefiniteTermContract');
  Route::get('/downloadPDF-fixed-term-contract',[HandlingPDF::class, 'pdf_fixed_term_contract'])->name('downloadFixedTermContract');
  Route::get('/downloadPDF-contract-terminal-work-labor-contract', [HandlingPDF::class, 'pdf_contract_terminal_work_labor_contract'])->name('downloadContractTerminalWorkLaborContract');
  Route::get('/downloadPDF-performance-evaluation',[HandlingPDF::class, 'pdf_performance_evaluation'])->name('downloadPerformaneEvaluation');
  Route::get('/downloadPDF-payroll-report',[HandlingPDF::class, 'pdf_payroll_report'])->name('downloadPayrollReport');
  Route::get('/downloadPDF-administrative-report',[HandlingPDF::class, 'pdf_administrative_report'])->name('downloadAdministrativeReport');
});
