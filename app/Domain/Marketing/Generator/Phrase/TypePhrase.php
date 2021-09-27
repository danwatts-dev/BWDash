<?php
namespace App\Domain\Marketing\Generator\Phrase;

use App\Domain\Marketing\Generator\Phrase;

class TypePhrase extends Phrase {

	const identifier = 'type';

	public function generate(): self {
		$this->string = $this->phraseData;
		return $this;
	}
}