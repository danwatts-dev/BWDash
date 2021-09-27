<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Person;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Domain\Tenants\Models\Tenant;
use App\Domain\Tenancy\Models\Tenancy;
use App\ViewModels\TenancyFormViewModel;
use App\ViewModels\TenancyShowViewModel;
use App\Http\Requests\TenancyStoreRequest;
use App\Domain\Tenancy\Actions\TenancyStoreAction;
use App\Domain\Tenancy\Actions\TenancyUpdateAction;
use App\Domain\Tenancy\Actions\InitiateTenancyAction;
use App\Domain\Tenancy\Actions\TenancyAddTenantAction;
use App\Domain\Tenancy\DataTransferobjects\TenancyData;

class TenancyController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('tenancy.index', [
			'tenancies' => Tenancy::limit(10)->get(),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$viewModel = new TenancyFormViewModel();
		return view('tenancy.form', $viewModel);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(
		TenancyStoreRequest $request,
		InitiateTenancyAction $initiateTenancy
	) {
		$tenancyData = TenancyData::fromRequest($request);
		$applicant = Applicant::where('person_id',$request->person_id)->first();
		$initiateTenancy->execute($tenancyData, $applicant);
		return redirect('/unit/'.$request->unit_id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Domain\Tenancy\Models\Tenancy  $tenancy
	 * @return \Illuminate\Http\Response
	 */
	public function show(Tenancy $tenancy) {
		$viewModel = new TenancyShowViewModel($tenancy);
		return view('tenancy.show', $viewModel);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Domain\Tenancy\Models\Tenancy  $tenancy
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Tenancy $tenancy) {
		$viewModel = new TenancyFormViewModel();
		return view('tenancy.form', $viewModel);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Domain\Tenancy\Models\Tenancy  $tenancy
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Tenancy $tenancy, TenancyUpdateAction $tenancyUpdateAction) {
		try {
			$tenancyUpdateAction->execute($tenancy, TenancyData::fromRequest($request));
		} catch (Exception) {
			// cannot initiate a tenancy for this prop
		}
		return view('welcome');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Domain\Tenancy\Models\Tenancy  $tenancy
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Tenancy $tenancy)
	{
		//
	}

}
