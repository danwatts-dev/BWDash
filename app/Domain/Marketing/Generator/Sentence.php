<?php
namespace App\Domain\Marketing\Generator;

class Sentence {

	protected $phraseCollection;

	public function __construct(PhraseCollection $phraseCollection) {
		$this->phraseCollection = $phraseCollection;
	}

	public function __call($name, $arguments) {
		if (!isset($this->phraseCollection[$name])) return '';
		array_unshift($arguments, $name);
		return call_user_func_array([$this, 'parsePhrase'], $arguments);
	}

	protected function list($items) {
		$items = array_filter($items);
		if (count($items) == 1) {
			return $items[0];
		} elseif (count($items) > 1) {
			$string = '';
			foreach ($items as $key => $value) {
				if ($key == 0) {
					$string .= $value;
				} elseif ($key == count($items) - 1) {
					$string .= ' and '.$value;
				} else {
					$string .= ', '.$value;
				}
			}
			return $string;
		}
	}

	public function parsePhrase($phrase_name, string $string = '') {
		return $string ? $this->phraseCollection[$phrase_name]->string.', '.$string : $this->phraseCollection[$phrase_name]->string;
	}

}