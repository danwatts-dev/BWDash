<?php

namespace App\Domain\Property\Models;

use App\Models\CouncilTaxBand;
use Spatie\ModelStates\HasStates;
use App\Domain\Tenancy\Models\Tenancy;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Property\Casts\AddressCast;
use App\Domain\Property\States\PropertyState;
use App\Domain\Tenancy\States\ActiveTenancyState;
use App\Domain\Tenancy\States\PendingTenancyState;
use App\Domain\Tenancy\States\ConfirmedTenancyState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\Property\DataTransferObjects\PropertyData;

class Property extends Model {

	use HasFactory;
	use HasStates;

	/**
	 * The accessors to append to the model's array form.
	 */
	protected $appends = [
		'occupancy_stats',
		'status_color',
		'status_name',
	];

	/**
	 * This model's casts
	 */
	protected $casts = [
		'address' => AddressCast::class,
		'status' => PropertyState::class,
	];

	/**
	 * This model's fillable attributes
	 */
	protected $fillable = [
		'address',
		'council_tax_band_id',
		'latitude',
		'longitude',
		'property_type_id',
		'reference',
		'main_image',
		'images',
	];

	// GETTERS //
	public function getStatusColorAttribute() {
		return $this->status->color();
	}

	public function getStatusNameAttribute() {
		return ucfirst($this->status->name());
	}

	public function getOccupancyStatsAttribute() {
		return [
			'all' => count($this->units),
			'available' => count($this->units->filter(function($unit, $key) {
				return $unit->current_tenancy == null;
			})),
			'occupied' => count($this->units->filter(function($unit, $key) {
				return ($unit->current_tenancy->status ?? '') == ActiveTenancyState::class;
			})),
			'pending' => count($this->units->filter(function($unit, $key) {
				return ($unit->current_tenancy->status ?? '') == PendingTenancyState::class;
			})),
			'confirmed' => count($this->units->filter(function($unit, $key) {
				return ($unit->current_tenancy->status ?? '') == ConfirmedTenancyState::class;
			})),
		];
	}

	public function councilTaxBand() {
		return $this->belongsTo(CouncilTaxBand::class);
	}

	public function tasks() {
		return $this->hasManyThrough(UnitTask::class, Unit::class);
	}

	public function type() {
		return $this->belongsTo(PropertyType::class, 'property_type_id');
	}

	public function units() {
		return $this->hasMany(Unit::class);
	}

	public static function createFromData(PropertyData $data) {
		return self::create($data->toArray());
	}

	public function getActiveTenanciesAttribute() {
		return Tenancy::whereIn('unit_id', function($q) {
			$q->select('*')->from('units')->where('property_id', $this->id);
		});
	}

}


// certificates
//     epc,
//     gas,

// [keys have for property and unit
// number,
// at least 2,
// b&w always has 1
// checked out,
// checked in,
// lost,
// ]

// can be replaced but needs paying for*]

// inventory per room, list with crud

// notes - report on damage, connect to incident.



// codes,

