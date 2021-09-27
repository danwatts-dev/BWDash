<?php
namespace App\Domain\Marketing\Generator\Phrase;

use App\Domain\Marketing\Generator\Phrase;

class LocationPhrase extends Phrase {

	const identifier = 'location';

	public function generate(): self {
		$this->string = 'in the '.$this->adjective().' area of '.$this->phraseData;
		return $this;
	}

	public function adjective() {
		$array = [
			'desirable',
			'highly sought after',
		];
		return $array[array_rand($array)];
	}

}