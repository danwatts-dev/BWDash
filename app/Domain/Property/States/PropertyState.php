<?php
namespace App\Domain\Property\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class PropertyState extends State {

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
			->default(Active::class)
			->allowTransition(Active::class, Disabled::class, ActiveToDisabled::class)
			->allowTransition(Disabled::class, Active::class);
	}

}