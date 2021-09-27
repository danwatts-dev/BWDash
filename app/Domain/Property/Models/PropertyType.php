<?php

namespace App\Domain\Property\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model {
	use HasFactory;

	public $appends = [
		'icon',
	];

	public function property() {
		return $this->hasMany(Property::class);
	}

	/**
	 * Returns the icon for this type
	 */
	public function getIconAttribute() {
		return [
			'hmo' => 'fas fa-users text-yellow-500',
			'house' => 'fas fa-home text-blue-500',
		][strtolower($this->name)] ?? '';
	}

}
