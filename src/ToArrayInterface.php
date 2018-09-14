<?php
declare(strict_types=1);

namespace Imponeer;

/**
 * Interface to define how object should be converted to array
 */
interface ToArrayInterface
{
	/**
	 * Converts object to array
	 *
	 * @return array
	 */
	public function toArray(): array;
}
