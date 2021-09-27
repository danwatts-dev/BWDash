<?php
namespace App\Domain\Marketing\Generator\Phrase;

use App\Domain\Marketing\Generator\Phrase;

class BedNumberPhrase extends Phrase {

	const identifier = 'bed_number';

	public function generate(): self {
		$this->string = $this->phraseData.' bed';
		return $this;
	}
}