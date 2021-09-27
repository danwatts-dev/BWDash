<?php
namespace App\Domain\Marketing\Generator;

use App\Domain\Marketing\Generator\DataTransferObjects\PhraseData;

class PhraseFactory {

	public function create(PhraseData $phraseData) {
		$phraseType = [
			Phrase\CouncilTaxPhrase::identifier => Phrase\CouncilTaxPhrase::class,
			Phrase\TypePhrase::identifier => Phrase\TypePhrase::class,
			Phrase\AllUtilitiesPhrase::identifier => Phrase\AllUtilitiesPhrase::class,
			Phrase\BedNumberPhrase::identifier => Phrase\BedNumberPhrase::class,
			Phrase\LocationPhrase::identifier => Phrase\LocationPhrase::class,
			Phrase\RecentlyRenovatedPhrase::identifier => Phrase\RecentlyRenovatedPhrase::class,
		][$phraseData->getName()];
		return new $phraseType($phraseData);
	}
}