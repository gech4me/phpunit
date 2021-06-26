<?php


namespace App\Support;


use ArrayIterator;
use IteratorAggregate;
use JetBrains\PhpStorm\Pure;
use JsonSerializable;

class Collection implements IteratorAggregate, JsonSerializable
{
    protected array $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get(): array
    {
        return $this->items;
    }

    #[Pure]
    public function count() : int
    {
        return count($this->items);
    }

    public function getIterator(): ArrayIterator
    {
       return new ArrayIterator($this->items);
    }

    public function add(array $items) {
        $this->items = array_merge($this->items, $items);
    }

    public function merge(Collection $collection): array
    {
        $this->add($collection->get());

        return $this->items;
    }

    public function toJson(): bool|string
    {
        return json_encode($this->items);
    }

    public function jsonSerialize()
    {
        return $this->items;
    }
}
