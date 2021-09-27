<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
{

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
			'address_line_1' => 'required|string',
			'address_postcode' => 'required|string',
			'property_type_id' => 'required|exists:property_types,id',
			'reference' => 'required',
			'council_tax_band_id' => 'required|int',
		];
	}

}
