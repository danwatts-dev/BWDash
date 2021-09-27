<?php
namespace App\Domain\Tenancy\States;

use App\Domain\Tenancy\Models\Tenancy;
use Spatie\ModelStates\Transition;

class PendingToDeclined extends Transition
{
	private Tenancy $tenancy;

	private string $message;

	public function __construct(Tenancy $tenancy, string $message) {
		$this->tenancy = $tenancy;
		$this->message = $message;
	}

	public function handle(): Tenancy {
		$this->payment->state = new DeclinedTenancyState($this->payment);
		$this->payment->failed_at = now();
		$this->payment->error_message = $this->message;

		$this->payment->save();

		return $this->payment;
	}
}