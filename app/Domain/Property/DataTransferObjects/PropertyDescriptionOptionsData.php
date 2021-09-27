<?php
namespace App\Domain\Property\DataTransferObjects;

use Illuminate\Http\Request;
use App\Domain\Marketing\Generator\DataTransferObjects\PhraseData;

class PropertyDescriptionOptionsData {

	private string $all_utilities;
	private string $bed_number;
	private string $location;
	private string $recently_renovated;
	private string $type;
	private string $council_tax;

	public function __construct(array $array) {
		array_map(function($prop) use ($array) {
			if (property_exists($this, $prop)) {
				$this->$prop = $array[$prop];
			}
		}, array_keys($array));
	}

	public static function fromRequest(Request $request) {
		return new self([
			'all_utilities' => $request->all_utilities ?? '',
			'bed_number' => $request->bed_number ?? '',
			'location' => $request->location,
			'recently_renovated' => $request->recently_renovated ?? '',
			'type' => $request->type ?? 'property',
			'council_tax' => $request->council_tax,
		]);
	}

	public function toPhraseData() {
		$array = [];
		foreach (get_object_vars($this) as $key => $prop) {
			if ($prop) {
				$array[$key] = new PhraseData($key, $prop);
			}
		}

		return $array;
	}
}