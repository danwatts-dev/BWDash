<?php
namespace App\Domain\Tenancy\States;

use App\Domain\Tenancy\States\TenancyState;
use App\Domain\Tenancy\Exceptions\InvalidTransitionException;

class TenancyTransitionFactory {

	public static function create(TenancyState $from, TenancyState $to): TenancyTransitionInterface {
		$transition = 'App\Domain\Tenancy\States\\'.$from->name().'To'.$to->name();
		if (!class_exists($transition)) throw new InvalidTransitionException('Cannot transition from '.$from.' to '.$to);

		return new $transition;
	}

}