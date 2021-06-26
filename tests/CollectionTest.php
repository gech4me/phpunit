<?php


use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testEmptyInstantiatedCollectionReturnsNoItems()
    {
        $collection = new App\Support\Collection;

        $this->assertEmpty($collection->get());
    }

    public function testCountIsCorrectForItemsPassedIn()
    {
        $collection = new App\Support\Collection([
            'one','two','three'
        ]);

        $this->assertEquals(3,$collection->count());
    }

    public function testItemsReturnedMatchItemsPassedIn() {
        $collection = new App\Support\Collection([
            'one','two'
        ]);

        $this->assertCount(2, $collection->get());
    }
}
