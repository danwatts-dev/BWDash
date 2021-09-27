<?php
namespace App\Domain\Shared\Traits;

use Illuminate\Support\Collection;

trait State {

	private static function resolveStateMapping() {
		$reflection = new \ReflectionClass(static::class);

		['dirname' => $directory] = pathinfo($reflection->getFileName());

		$files = scandir($directory);
		unset($files[0]);
		$namespace = $reflection->getNamespaceName();
		$resolvedStates = [];
		foreach ($files as $file) {
			['filename' => $className] = pathinfo($file);

			$stateClass = $namespace.'\\'.$className;

			if (!is_subclass_of($stateClass, $reflection->name)) {
				continue;
			}

			$resolvedStates[] = $stateClass;
		}
		return $resolvedStates;
	}

	public static function all(): Collection {
		return collect(static::resolveStateMapping())->map(function($state) {
			return new $state;
		});
	}

}