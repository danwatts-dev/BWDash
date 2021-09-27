<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\ViewModels\PersonShowViewModel;

class PersonController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('person.index', ['people' => Person::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$viewModel = new PersonFormViewModel();
		return view('person.form', $viewModel);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PersonStoreRequest $request) {
		$person = $personStoreAction->execute(PersonData::fromRequest($request));
		return redirect()->route('person.show', ['person' => $person->id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Person  $person
	 * @return \Illuminate\Http\Response
	 */
	public function show(Person $person) {
		$viewModel = new PersonShowViewModel($person);
		return view('person.show', $viewModel);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Person  $person
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Person $person) {
		$viewModel = new PersonFormViewModel();
		return view('person.form', $viewModel);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Person  $person
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Person $person) {
		$person = $personStoreAction->execute(PersonData::fromRequest($request));
		return redirect()->route('person.show', ['person' => $person->id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Person  $person
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Person $person)
	{
		//
	}

}
