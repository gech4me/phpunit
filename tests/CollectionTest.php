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

        $result = $collection->get();

        $this->assertCount(2, $result);
        $this->assertEquals('one',$result[0]);
        $this->assertEquals('two',$result[1]);
    }
}
