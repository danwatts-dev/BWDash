<?php

namespace App\Domain\Marketing\Generator;

use Illuminate\Support\Collection;

class SentenceCollection extends Collection {

	public function __construct(array $data) {
		parent::__construct($data);
	}

	public function output() {
		return array_map(function($sentence) {
			return $sentence ? $sentence->generate() : '';
		}, $this->toArray());
	}

}