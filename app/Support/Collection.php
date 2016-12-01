<?php 

declare(strict_types=1);

namespace App\Support;

use IteratorAggregate;
use ArrayIterator;

class Collection implements IteratorAggregate
{
	/**
	 * [$items array items]
	 * @var array
	 */
	private $items = [];

	public function __construct(array $items = [])
	{
		$this->items = $items;
	}

	public function getIterator(): ArrayIterator
	{
		return new ArrayIterator($this->items);
	}

	public function get(): array
	{
		return $this->items;
	}

	public function count(): int
	{
		return count($this->items);
	}

	public function merge(Collection $collection): void
	{
		$this->add($collection->get());
		//return new Collection(array_merge($this->get(),$collection->get()));
	}

	public function add(array $items): void
	{
		$this->items = array_merge($this->items, $items);
	}

	public function toJson(): string
	{
		return json_encode($this->items);
	}
}