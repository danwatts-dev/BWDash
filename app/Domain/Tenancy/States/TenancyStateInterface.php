<?php
namespace App\Domain\Tenancy\States;

interface TenancyStateInterface {

	public function color(): string;

	public function name(): string;

}