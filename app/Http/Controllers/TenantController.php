<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Domain\Tenants\Models\Tenant;
use App\Http\Requests\LeadStoreRequest;

class TenantController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('person.index', [
			'person_type' => 'tenant',
		]);
	}

	// /**
	//  * Show the form for creating a new resource.
	//  *
	//  * @return \Illuminate\Http\Response
	//  */
	// public function create() {
	// }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function store(LeadStoreRequest $request) {
		$person = Person::create($request->all());
		$lead = $person->lead()->create(['interests' => json_encode('')]);
        return view('lead.show', ['lead' => $lead]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Lead  $lead
	 * @return \Illuminate\Http\Response
	 */
	public function show($person_id) {
		$tenant = Tenant::where('person_id', $person_id)->first();
		return view('tenant.show', ['tenant' => $tenant]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Lead  $lead
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Lead $lead)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Lead  $lead
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Lead $lead)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Lead  $lead
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Lead $lead)
	{
		//
	}

}
