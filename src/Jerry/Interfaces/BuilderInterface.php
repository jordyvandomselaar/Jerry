<?php
declare(strict_types=1);

namespace Jerry\Interfaces;

interface BuilderInterface
{
    /**
     * @return \stdClass[]
     */
    public function getResults(QueryInterface $query): array;

    public function getSql(): string;
}