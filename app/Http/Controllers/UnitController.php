<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Property\Models\Unit;
use App\ViewModels\UnitFormViewModel;
use App\ViewModels\UnitShowViewModel;

class UnitController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('unit.index', ['units' => Unit::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$viewModel = new UnitFormViewModel();
		return view('property.form', $viewModel);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Unit  $unit
	 * @return \Illuminate\Http\Response
	 */
	public function show(Unit $unit) {
		$viewModel = new UnitShowViewModel($unit);
		return view('unit.show', $viewModel);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Unit  $unit
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Unit $unit)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Unit  $unit
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Unit $unit)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Unit  $unit
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Unit $unit)
	{
		//
	}

}
