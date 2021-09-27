<?php
namespace App\Domain\Marketing\Generator\DataTransferObjects;

class PhraseData {

	private $name;
	private $value;

	public function __construct(string $name, string $value) {
		$this->name = $name;
		$this->value = $value;
	}

	public function __toString() {
		return $this->value;
	}

	public function getName() {
		return $this->name;
	}
}