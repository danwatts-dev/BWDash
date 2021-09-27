<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Domain\Property\Models\Property;
use App\ViewModels\PropertyFormViewModel;
use App\Http\Requests\PropertyStoreRequest;
use App\Domain\Property\Actions\PropertyStoreAction;
use App\Domain\Property\Actions\PropertyUpdateAction;
use App\Domain\Property\DataTransferObjects\PropertyData;

class ApiPropertyController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		return Property::with('type')->with('units')->with('tasks')
			->when($request->has('is_visible'), function($q) use ($request) {
				$q->where('is_visible', $request->input('is_visible'));
			})
			->when($request->has('is_active'), function($q) use ($request) {
				$q->where('is_active', $request->input('is_active'));
			})->limit(10)->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return new PropertyFormViewModel();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, PropertyStoreAction $propertyStoreAction) {
		$property = $propertyStoreAction->execute(PropertyData::fromRequest($request));
		return $property->toJson();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Property  $property
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		return Property::with('type')->find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Property  $property
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request) {
		$property = Property::find($request->input('id'));
		return new PropertyFormViewModel($property);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Property  $property
	 * @return \Illuminate\Http\Response
	 */
	public function update(PropertyStoreRequest $request, PropertyUpdateAction $propertyUpdateAction) {
		$errors = new MessageBag;
		$validated = PropertyData::fromRequest($request);

		try {
			$property = $propertyUpdateAction->execute($validated);
		} catch (\Exception $e) {
			$errors->add('status', $e->getMessage());
			return response()->json(['errors' => $errors],422);
		}

		return $property->toJson();
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
