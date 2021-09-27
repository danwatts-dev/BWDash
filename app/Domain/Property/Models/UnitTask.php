<?php

namespace App\Domain\Property\Models;

use Carbon\Carbon;
use Spatie\ModelStates\HasStates;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Property\States\Urgency\Urgency;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitTask extends Model {

	use HasFactory;

	protected $appends = [
		'color',
	];

	// RELATIONSHIPS
	public function unit() {
		return $this->belongsTo(Unit::class);
	}

	//GETTERS
	public function getColorAttribute() {
		return [
			'gray',
			'yellow',
			'red',
		][$this->urgency];
	}

	//SCOPES

}
