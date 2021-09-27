<?php

namespace App\Http\Controllers;

use App\Domain\Property\Actions\PropertyStoreAction;
use App\Domain\Property\Models\Property;
use App\Domain\Property\Models\PropertyType;
use Illuminate\Http\Request;
use App\ViewModels\PropertyFormViewModel;
use App\ViewModels\PropertyIndexViewModel;
use App\Http\Requests\PropertyStoreRequest;
use App\Domain\Property\Actions\PropertyUpdateAction;
use App\Domain\Property\DataTransferObjects\PropertyData;

class PropertyController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$viewModel = new PropertyIndexViewModel();
		return view('property.index', $viewModel);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$viewModel = new PropertyFormViewModel();
		return view('property.form', $viewModel);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PropertyStoreRequest $request, PropertyStoreAction $propertyStoreAction) {
		$property = $propertyStoreAction->execute(PropertyData::fromRequest($request));
		return redirect()->route('property.show', ['property' => $property->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Property  $property
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$property = Property::with('type')->find($id);
		return view('property.show', [
			'property' => $property,
			'property_types' => PropertyType::all(),
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Property  $property
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Property $property) {
		 $viewModel = new PropertyFormViewModel($property);
		 return view('property.form', $viewModel);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Property  $property
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Property $property, PropertyUpdateAction $propertyStoreAction) {
		$validated = PropertyData::fromRequest($request);
		$property->update($validated->toArray());
		return redirect()->back()
			->with('success','Product updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Property  $property
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Property $property) {

	}

}
