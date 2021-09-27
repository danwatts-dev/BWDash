<?php
namespace App\Domain\Tenancy\Actions;

use App\Domain\Tenancy\States\TenancyState;
use App\Domain\Tenancy\States\TenancyTransitionFactory;
use App\Domain\Tenancy\Models\Tenancy;

/**
 * Updates a tenancy in the db
 */
class TenancyChangeStateAction {

	/**
	 * The transition factory used by this action
	 */
	private TenancyTransitionFactory $factory;

	/**
	 * Constructor
	 */
	public function __construct(TenancyTransitionFactory $factory) {
		$this->factory = $factory;
	}

	/**
	 * Executes this action
	 */
	public function execute (
		Tenancy $tenancy,
		?TenancyState $state
	) {
		if (is_null($state) || $tenancy->state === $state) return;
		($this->factory->create($tenancy->state, $state))->execute($tenancy, $state);
		//Logger::log();
	}

}