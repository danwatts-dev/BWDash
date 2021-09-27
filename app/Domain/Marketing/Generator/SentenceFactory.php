<?php
namespace App\Domain\Marketing\Generator;

use App\Domain\Marketing\Generator\Sentence\{
	HeadlineSentence,
	IncludesBillsSentence,
};
use App\Domain\Property\DataTransferObjects\PropertyDescriptionOptionsData;
use App\Domain\Marketing\Generator\Exceptions\SentenceException;

class SentenceFactory {

	public $phraseFactory;
	private $propertyData;
	private $phraseCollection;

	/**
	 * All available sentence types
	 */
	const sentenceTypes = [
		HeadlineSentence::class,
		IncludesBillsSentence::class,
	];

	/**
	 * A constructor
	 */
	public function __construct(PhraseFactory $phraseFactory) {
		$this->phraseFactory = $phraseFactory;
	}

	/**
	 * Try to build sentences using passed in data
	 */
	public function create(PropertyDescriptionOptionsData $propertyData): SentenceCollection {
		$this->propertyData = $propertyData;

		$sentenceArray = array_map(function($sentenceType) {
			try {
				return new $sentenceType($this->getPhraseCollection());
			} catch (SentenceException $e) {
				return;
			}
		}, self::sentenceTypes);

		return new SentenceCollection($sentenceArray);
	}

	/**
	 * Get all the phrases we can build from the passed in data
	 */
	private function getPhraseCollection(): PhraseCollection {
		if ($this->phraseCollection) return $this->phraseCollection;

		$phraseArray = array_map(function($PhraseData) {
			return $this->phraseFactory->create($PhraseData)->generate();
		}, $this->propertyData->toPhraseData());

		return (new PhraseCollection($phraseArray))->keyBy(function($phrase) {
			return $phrase->name();
		});;
	}

}