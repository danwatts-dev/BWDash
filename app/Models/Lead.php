<?php
namespace App\Models;

use App\Domain\Shared\Traits\HasPerson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model {

	use HasFactory;
	use HasPerson;
	use SoftDeletes;

	protected $fillable = [
		'interests',
	];

	public function person() {
		return $this->belongsTo(Person::class);
	}

}
