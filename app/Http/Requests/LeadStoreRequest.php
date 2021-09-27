<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadStoreRequest extends FormRequest{

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
	public function rules(PersonStoreRequest $personStoreRequest) {
		return array_merge($personStoreRequest->rules(), [
			'interests' => 'required',
		]);
	}

}