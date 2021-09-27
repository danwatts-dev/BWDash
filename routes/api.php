<?php

use App\Models\Lead;
use App\Models\Person;
use Nette\Utils\Random;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Domain\Property\Models\Property;
use App\Http\Controllers\ApiUnitController;
use App\Domain\Property\Generator\Generator;
use App\Http\Controllers\ApiPropertyController;
use App\Domain\Property\DataTransferObjects\PropertyDescriptionOptionsData;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

// Route::put('/property/{property}', function (Request $request, Property $property) {
// 	$property->is_visible = $request->visibility;
// 	return $property->save();
// });

// Route::get('/property/{property}', function (Request $request, Property $property) {
// 	return $property;
// });

Route::get('/property/create', [ApiPropertyController::class, 'create']);
Route::post('/property/edit', [ApiPropertyController::class, 'edit']);
Route::post('/property/update', [ApiPropertyController::class, 'update']);
Route::post('/property/store', [ApiPropertyController::class, 'store']);
Route::get('/property', [ApiPropertyController::class, 'index']);
Route::post('/property-search', function(Request $request) {
	if ($request->get('reference')) {
		return Property::where('reference', $request->get('reference'))->get();
	}
});

Route::get('/unit/create', [ApiUnitController::class, 'create']);
Route::post('/unit/store', [ApiUnitController::class, 'store']);
Route::get('/unit', [ApiUnitController::class, 'index']);
Route::delete('/unit/{unit}', [ApiUnitController::class, 'destroy']);




Route::get('/person', function (Request $request) {
	return Person::when($request->has('is_tenant'), function($q) {
			$q->whereHas('tenancies', function($q) {
				$q->where('status', 'active');
			});
		})
		->when($request->has('is_pending'), function($q) {
			$q->whereHas('tenancies', function($q) {
				$q->where('status', 'pending');
			});
		})->limit(10)->get();
});

Route::get('/lead', function (Request $request) {
	return Person::whereHas('lead')->get();
});

Route::get('/applicant', function (Request $request) {
	return Person::whereHas('applicant')->get();
});

Route::get('/tenant', function (Request $request) {
	return Person::whereHas('tenant')->get();
});

Route::post('/person/search', function (Request $request) {
	return Person::where('first_name', 'LIKE', "%{$request->input('query')}%")
		->orWhere('last_name', 'LIKE', "%{$request->input('query')}%")
		->get();
});

// Route::post('/property/search', function (Request $request) {
// 	return Property::with('tenancies')
// 		->where('address_line_1', 'LIKE', "%{$request->search_term}%")
// 		->orWhere('address_postcode', 'LIKE', "%{$request->search_term}%")
// 		->limit(10)->get();
// });

// Route::get('/generate-description', function (Request $request, Generator $generator) {
// 	$property = Property::find($request->get('id'));
// 	$data = new PropertyDescriptionOptionsData([
// 			'bed_number' => '1',
// 			'location' => 'Earlsdon',
// 			'recently_renovated' => true,
// 			'all_utilities' => true,
// 			'council_tax' => true,
// 			'type' => 'studio',
// 			'en suite' => true,
// 		]);

// 	return response()->json(['text' => $generator->execute($data)]);
// });