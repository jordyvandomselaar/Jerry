<?php
declare(strict_types=1);

namespace Jerry\Interfaces;

use Jerry\Interfaces\Statements\FilterInterface;

interface QueryInterface
{
    public function addFilter(FilterInterface ...$filter): void;
}