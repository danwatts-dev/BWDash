<?php

namespace App\Domain\Marketing\Generator;

use Illuminate\Support\Collection;

class PhraseCollection extends Collection {

	public function __construct(array $data) {
		parent::__construct($data);
	}

}