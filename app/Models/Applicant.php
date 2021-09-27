<?php
namespace App\Models;

use App\Domain\Shared\Traits\HasPerson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
	use HasFactory;
	use HasPerson;
	use SoftDeletes;

	public function person() {
		return $this->belongsTo(Person::class);
	}

	public function IsValid(): bool {
		return true;
	}

    public function getStepsAttribute(): array {
		return [
			[
				'name' => 'Check references',
				'status' => 'complete',
			],
			[
				'name' => 'Copied Id',
				'status' => 'complete',
			],
			[
				'name' => 'Confirm bank details',
				'status' => 'complete',
			],
		];
	}

}
