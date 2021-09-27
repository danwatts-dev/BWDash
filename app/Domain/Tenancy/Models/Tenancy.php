<?php
namespace App\Domain\Tenancy\Models;

use App\Domain\Property\Models\Property;
use Spatie\ModelStates\HasStates;
use App\Domain\Property\Models\Unit;
use App\Domain\Tenancy\Casts\TenancyTermCast;
use App\Domain\Tenants\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Tenancy\States\TenancyState;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenancy extends Model {

	use HasFactory;
	use HasStates;

	/**
	 * This model's casts
	 */
	protected $casts = [
		'status' => TenancyState::class,
		'term_in_months' => TenancyTermCast::class,
	];

	/**
	 * Mass assignable props
	 */
	protected $fillable = [
		'unit_id',
		'term_in_months',
		'terminates',
	];

	protected $defaults = [
		'terminates' => '',
	];

	/**
	 * Returns relationship to Unit
	 */
	public function unit() {
		return $this->belongsTo(Unit::class);
	}

	/**
	 * Returns relationship to tenants
	 */
	public function tenants() {
		return $this->belongsToMany(Tenant::class);
	}

	//GETTERS//

	/**
	 * Returns relationship to Unit
	 */
	public function getPropertyAttribute() {
		return $this->unit->property;
	}

	public function getStepsAttribute(): array {
		return [
			[
				'name' => 'Contract sent',
				'status' => 'complete',
			],
			[
				'name' => 'Contract signed by tenant(s)',
				'status' => 'complete',
			],
            [
				'name' => 'Contract signed by us',
				'status' => 'complete',
			],
		];
	}

}
