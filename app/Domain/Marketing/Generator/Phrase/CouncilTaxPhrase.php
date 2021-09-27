<?php
namespace App\Domain\Marketing\Generator\Phrase;

use App\Domain\Marketing\Generator\Phrase;

class CouncilTaxPhrase extends Phrase {

	const identifier = 'council_tax';

	public function generate(): self {
		$this->string = 'council tax';
		return $this;
	}
}