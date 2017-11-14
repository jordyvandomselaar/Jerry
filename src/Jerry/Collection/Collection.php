<?php
declare(strict_types=1);

namespace Jerry\Collection;

use Jerry\Collection\Loop\Loop;
use Jerry\Interfaces\Collection\CollectionInterface;

class Collection extends \ArrayIterator implements CollectionInterface
{
    public function toArray(): array
    {
        return $this->getArrayCopy();
    }

    public function each(callable $callback): void
    {
        $loop = new Loop($this);

        while ($this->valid()) {
            $callback($this->key(), $this->current(), $loop);

            $this->next();
        }

        $this->rewind();
    }

    public function map(callable $callback): void
    {
        $loop = new Loop($this);

        while ($this->valid()) {
            $result = $callback($this->key(), $this->current(), $loop);

            $this->offsetSet($this->getCurrentOffset(), $result);

            $this->next();
        }

        $this->rewind();
    }

    public function getCurrentOffset(): int
    {
        return \array_flip(
            \array_values($this->toArray())
        )[$this->current()];
    }
}