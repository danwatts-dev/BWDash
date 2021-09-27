<?php

namespace App\Domain\Property\Models;

use App\Domain\Tenancy\Models\Tenancy;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Tenancy\States\ActiveTenancyState;
use App\Domain\Tenancy\States\PendingTenancyState;
use App\Domain\Property\DataTransferObjects\UnitData;
use App\Domain\Property\States\Disabled;
use App\Domain\Tenancy\States\ConfirmedTenancyState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;

class Unit extends Model {
	use HasFactory;

	protected $appends = [
		'status_color',
		'status_name',
		'current_tenancy',
		'current_tasks',
		'current_tenants',
		'current_keys',
	];

	protected $fillable = [
		'unit_name',
		'bathrooms',
		'bedrooms',
		'deposit_amount',
		'rent',
		'size',
		'type',
		'property_id',
	];

	// RELATIONSHIPS
	public function property() {
		return $this->belongsTo(Property::class);
	}

	public function tasks() {
		return $this->hasMany(UnitTask::class);
	}

	public function tenancies() {
		return $this->hasMany(Tenancy::class);
	}

	// GETTERS
	public function getStatusColorAttribute() {
		return $this->current_tenancy ? $this->current_tenancy->status->color() : 'blue';
	}

	public function getStatusNameAttribute() {
		return ucfirst($this->current_tenancy ? $this->current_tenancy->status->name() : 'Available');
	}

	public function getCurrentKeysAttribute() {
		return [];
	}

	public function getCurrentTasksAttribute() {
		return $this->tasks->where('is_complete', false);
	}

	public function getCurrentTenancyAttribute() {
		return $this->tenancies->whereIn('status', [
			ActiveTenancyState::class,
			PendingTenancyState::class,
			ConfirmedTenancyState::class,
		])->first();
	}

	public function getCurrentTenantsAttribute(): Collection {
		$tenants = $this->current_tenancy?->tenants;
		return $tenants ?? new Collection([]);
	}

	// SCOPES

	/**
	 * Returns a collection of available units.
	 * Available means they do not have active, pending or confirmed tenancies
	 */
	public function scopeAvailable($query) {
		$query->whereDoesntHave('tenancies', function($q) {
			$q->whereIn('status', [
				ActiveTenancyState::class,
				PendingTenancyState::class,
				ConfirmedTenancyState::class,
			]);
		})->whereDoesntHave('property', function($q) {
			$q->where('status', 'disabled');
		})
		->get();
	}

	// OTHERS

	/**
	 * Returns this units current tenancy if it has one
	 */
	public function hasCurrentTenancy() {
		return !empty($this->current_tenancy);
	}

	/**
	 * Returns true if this unit has no current tenancy and is not disabled
	 */
	public function IsAvailable(): bool {
		return is_null($this->current_tenancy);
	}

	public static function createFromData(UnitData $data) {
		return self::create($data->toArray());
	}

}
