<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenancyStoreRequest extends FormRequest{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'unit_id' => 'required|exists:units,id',
			'person_id' => 'required|exists:people,id',
			'term_in_months' => 'required',
		];
	}

}