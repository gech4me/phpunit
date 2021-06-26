<?php


namespace App\Support;


use JetBrains\PhpStorm\Pure;

class Collection
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
}
