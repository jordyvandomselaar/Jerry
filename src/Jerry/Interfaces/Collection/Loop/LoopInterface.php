<?php
declare(strict_types=1);

namespace Jerry\Interfaces\Collection\Loop;

interface LoopInterface
{
    public function first(): bool;

    public function last(): bool;
}