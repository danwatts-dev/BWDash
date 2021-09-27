<?php
namespace App\Domain\Marketing\Generator;

use App\Domain\Property\DataTransferObjects\PropertyDescriptionOptionsData;

class Generator {

	private $sentenceFactory;

	public function __construct(SentenceFactory $sentenceFactory) {
		$this->sentenceFactory = $sentenceFactory;
	}

	public function execute(PropertyDescriptionOptionsData $optionsData) {
		return $this->sentenceFactory->create($optionsData)->output();
	}

}