<?php
declare(strict_types=1);

namespace Jerry\Interfaces\Collection;

interface CollectionInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
{
    public function toArray(): array;

    public function each(callable $callback): void;

    public function map(callable $callback): void;

    public function getCurrentOffset(): int;
}