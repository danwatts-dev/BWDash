<?php
namespace App\Domain\Marketing\Generator\Sentence;

use App\Domain\Marketing\Generator\Sentence;

class HeadlineSentence extends Sentence {

	public function generate() {
		$this->string = $this->intro().' '.$this->bed_number($this->recently_renovated($this->bright())).' '.$this->type().' '.$this->location();
		return ucfirst($this->string).'. ';
	}

	private function intro() {
		return 'Barrett and Ward are '.$this->option().' this';
	}

	private function option() {
	   $array = [
			'delighted to present',
			'pleased to offer',
		];
		return $array[array_rand($array)];
	}

}