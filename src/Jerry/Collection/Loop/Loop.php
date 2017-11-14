<?php
declare(strict_types=1);

namespace Jerry\Collection\Loop;

use Jerry\Interfaces\Collection\CollectionInterface;
use Jerry\Interfaces\Collection\Loop\LoopInterface;

class Loop implements LoopInterface
{
    /** @var CollectionInterface */
    private $collection;

    public function __construct(CollectionInterface $collection)
    {
        $this->collection = $collection;
    }

    public function first(): bool
    {
        return ($this->collection->getCurrentOffset() == 0);
    }

    public function last(): bool
    {
        return ($this->collection->getCurrentOffset() == $this->collection->count());
    }

}