<?php
namespace App\Domain\Marketing\Generator\Phrase;

use App\Domain\Marketing\Generator\Phrase;

class AllUtilitiesPhrase extends Phrase {

	const identifier = 'all_utilities';

	public function generate(): self {
		$this->string = 'ALL utilities';
		return $this;
	}
}