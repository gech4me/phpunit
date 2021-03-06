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

    public function testCollectionIsInstanceOfIteratorAggregate()
    {
        $collection = new App\Support\Collection;
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    public function testCollectionCanBeIterated()
    {
        $collection = new App\Support\Collection([
            'one','two','three'
        ]);

        $items = [];
        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class,$collection->getIterator());
    }

    public function testCanCollectionMergeToAnotherCollection()
    {
        $collectionOne = new App\Support\Collection([
            'one','two','three'
        ]);

        $collectionTwo = new App\Support\Collection([
            'four','five'
        ]);

        $collectionOne->merge($collectionTwo);

        $this->assertCount(5, $collectionOne->get());
    }

    public function testCanAddToExistingCollection()
    {
        $collection = new App\Support\Collection([
            'one','two','three'
        ]);

        $collection->add(['four']);

        $this->assertEquals(4, $collection->count());
        $this->assertCount(4, $collection->get());
    }

    public function testReturnsJsonEncodedItems()
    {
        $collection = new \App\Support\Collection([
           ["username" => "getachew"],
           ["username" => "gech2me"],
        ]);

        $this->assertIsString($collection->toJson());
        $this->assertEquals('[{"username":"getachew"},{"username":"gech2me"}]', $collection->toJson());
    }

    public function testJsonEncodingACollectionObjectReturnsJson()
    {
        $collection = new \App\Support\Collection([
            ["username" => "getachew"],
            ["username" => "gech2me"],
        ]);

        $encoded = json_encode($collection);

        $this->assertIsString($encoded);
        $this->assertEquals('[{"username":"getachew"},{"username":"gech2me"}]', $encoded);
    }
}
