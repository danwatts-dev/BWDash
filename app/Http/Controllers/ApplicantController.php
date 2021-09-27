<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\ViewModels\ApplicantFormViewModel;

class ApplicantController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('person.index', [
			'person_type' => 'applicant',
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {
		$person = Person::find($request->input('person_id'));
		$viewModel = new ApplicantFormViewModel($person ?? null);
		return view('applicant.create', $viewModel);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$person = Person::find($request->input('person_id'));
		// fire event when storing an applicant to tell somehting to soft delete the lead
		$person->applicant()->create([]);
		$person->lead->delete();
		return view('person.index', [
			'person_type' => 'applicant',
		]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Applicant  $applicant
	 * @return \Illuminate\Http\Response
	 */
	public function show($person_id) {
		$applicant = Applicant::where('person_id', $person_id)->first();
		return view('applicant.show', ['applicant' => $applicant]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Applicant  $applicant
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Applicant $applicant)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Applicant  $applicant
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Applicant $applicant)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Applicant  $applicant
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Applicant $applicant)
	{
		//
	}

}
