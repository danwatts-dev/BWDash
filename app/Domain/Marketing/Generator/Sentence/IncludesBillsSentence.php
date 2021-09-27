<?php
namespace App\Domain\Marketing\Generator\Sentence;

use App\Domain\Marketing\Generator\{
	Sentence,
};

class IncludesBillsSentence extends Sentence {

	// public function __construct(PhraseCollection $phraseCollection) {
	// 	if (!isset($phraseCollection['all_utilities'])) throw new SentenceException();
	// 	$this->phraseCollection = $phraseCollection;
	// }

	public function generate() {
		$this->string = $this->intro().' '.$this->list([$this->all_utilities(), $this->council_tax(), $this->wifi()]);
		return ucfirst($this->string).'. ';
	}

	private function intro() {
		return 'Includes';
	}

}