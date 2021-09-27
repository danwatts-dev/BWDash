<?php
namespace App\Domain\Marketing\Generator\Phrase;

use App\Domain\Marketing\Generator\Phrase;

class RecentlyRenovatedPhrase extends Phrase {

	const identifier = 'recently_renovated';

	public function generate(): self {
		$this->string = 'recently renovated';
		return $this;
	}
}