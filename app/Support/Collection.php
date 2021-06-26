<?php


namespace App\Support;


use ArrayIterator;
use IteratorAggregate;
use JetBrains\PhpStorm\Pure;

class Collection implements IteratorAggregate
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
}
