<?php
declare(strict_types=1);

namespace Jerry\QueryBuilder\Query;

use Jerry\Interfaces\QueryInterface;
use Jerry\Interfaces\StatementInterface;
use Jerry\Interfaces\Statements\FilterInterface;

class Query implements QueryInterface
{
    /** @var array */
    private $filters = [];

    public function __construct(StatementInterface ...$statements)
    {
        foreach ($statements as $statement) {
            if ($statement instanceof FilterInterface) {
                $this->addFilter($statement);
            }
        }
    }

    public function addFilter(FilterInterface ...$filter): void
    {
        $this->filters = \array_merge($this->filters, $filter);
    }
}