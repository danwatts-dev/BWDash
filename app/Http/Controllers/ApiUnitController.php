<?php

namespace App\Http\Controllers;

use App\Domain\Property\Models\Unit;
use Illuminate\Http\Request;
use App\ViewModels\UnitFormViewModel;
use App\Http\Requests\UnitStoreRequest;
use App\Domain\Property\DataTransferObjects\UnitData;

class ApiUnitController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		return Unit::with('tenancies.tenants.person')
			->when($request->get('property_id'), function($q) use ($request) {
				$q->where('property_id', $request->get('property_id'));
			})->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return new UnitFormViewModel();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Unit $unit) {
		$validated = UnitData::fromRequest($request);
		$unit = Unit::createFromData($validated);
		return $unit->toJson();
	}

	// /**
	//  * Display the specified resource.
	//  *
	//  * @param  \App\Models\Property  $property
	//  * @return \Illuminate\Http\Response
	//  */
	// public function show($id) {
	// 	return Property::with('type')->find($id);
	// }

	// /**
	//  * Show the form for editing the specified resource.
	//  *
	//  * @param  \App\Models\Property  $property
	//  * @return \Illuminate\Http\Response
	//  */
	// public function edit(Request $request) {
	// 	$property = Property::find($request->input('id'));
	// 	return new PropertyFormViewModel($property);
	// }

	// /**
	//  * Update the specified resource in storage.
	//  *
	//  * @param  \Illuminate\Http\Request  $request
	//  * @param  \App\Models\Property  $property
	//  * @return \Illuminate\Http\Response
	//  */
	// public function update(PropertyStoreRequest $request, PropertyUpdateAction $propertyStoreAction) {
	// 	$validated = PropertyData::fromRequest($request);
	// 	$property = $propertyStoreAction->execute($validated);
	// 	return $property->toJson();
	// }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Property  $property
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Unit $unit) {
		$unit->delete();
		return 'success';
	}

}
