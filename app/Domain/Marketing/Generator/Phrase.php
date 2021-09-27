<?php
namespace App\Domain\Marketing\Generator;

use App\Domain\Marketing\Generator\DataTransferObjects\PhraseData;

class Phrase {

	protected $phraseData;
	public $string;

	public function __construct(PhraseData $phraseData) {
		return $this->phraseData = $phraseData;
	}

	public function generate(): self {
		$this->string = '';
		return $this;
	}

	public function name() {
		return $this->phraseData->getName();
	}

	public function __toString() {
		return $this->string;
	}
}