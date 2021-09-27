<?php

use App\Models\Person;
use App\Domain\Tenants\Models\Tenant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TenancyController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ApplicantController;

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
	return redirect('/property');
});
Route::get('/tenants', function() {
	$people = Tenant::all();
	return view('person.index')->with('people', $people);
});
Route::resource('person', PersonController::class);
Route::resource('lead', LeadController::class);
Route::resource('applicant', ApplicantController::class);
Route::resource('tenant', TenantController::class);



Route::resource('tenancy', TenancyController::class);
Route::resource('property', PropertyController::class);
Route::resource('unit', UnitController::class);