<?php

namespace App\Models;

use App\Domain\Tenants\Models\Tenant;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model {

	use HasFactory;

	protected $fillable = [
		'first_name',
		'last_name',
		'middle_name',
		'email',
		'home_phone',
		'mobile_phone',
	];

	public function getNameAttribute() {
		return $this->first_name.' '.$this->last_name;
	}

	public function tenant() {
		return $this->hasOne(Tenant::class);
	}

	public function lead() {
		return $this->hasOne(Lead::class);
	}

	public function applicant() {
		return $this->hasOne(Applicant::class);
	}

}
