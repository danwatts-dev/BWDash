<?php

namespace App\Domain\Tenants\Models;

use App\Models\Person;
use App\Domain\Tenancy\Models\Tenancy;
use App\Domain\Shared\Traits\HasPerson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model {

	use HasFactory;
	use HasPerson;

	protected $appends = [
		'dot_color',
		'name',
	];

	protected $fillable = [
		'person_id',
	];

	// RELATIONSHIPS //
	public function person() {
		return $this->belongsTo(Person::class);
	}

	public function tenancies() {
		return $this->belongsToMany(Tenancy::class);
	}

	// GETTERS //
	public function getDotColorAttribute() {
		if ($this->tenant_status == 'active') {
			return 'text-green-500';
		} elseif (!$this->tenant_status == 'pending') {
			return 'text-blue-500';
		} else {
			return 'text-gray-500';
		}
	}

	public function getStatusAttribute() {
		return $this->current_tenancy->state;
	}

	public function getCurrentTenancyAttribute() {
		return $this->tenancies->whereIn('status', [
			ActiveTenancyState::class,
			PendingTenancyState::class,
			ConfirmedTenancyState::class,
		])->first();
	}

	// SCOPES //
	// public function scopeIsActiveTenant($query) {
	// 	$query->whereHas('tenancies', function($q) {
	// 		$q->where('status', 'active');
	// 	})->get();
	// }

	// public function scopeIsPendingTenant($query) {
	// 	$query->whereHas('tenancies', function($q) {
	// 		$q->where('status', 'pending');
	// 	})->get();
	// }

}
