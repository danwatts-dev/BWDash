<?php
namespace App\Domain\Tenancy\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

class TenancyState extends State {

	const color = '';
	const name = '';

	public function color(): string {
		return static::color;
	}

	public function name(): string {
		return static::name;
	}

	public static function config(): StateConfig {
		return parent::config()
			->default(PendingTenancyState::class)
			->allowTransition(PendingTenancyState::class, DeclinedTenancyState::class)
			->allowTransition(PendingTenancyState::class, ConfirmedTenancyState::class);

	}

}