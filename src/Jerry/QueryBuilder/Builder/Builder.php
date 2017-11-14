<?php
declare(strict_types=1);

namespace Jerry\QueryBuilder\Builder;

use Jerry\Interfaces\BuilderInterface;
use Jerry\Interfaces\ConnectorInterface;
use Jerry\Interfaces\QueryInterface;
use Jerry\Interfaces\Statements\FilterInterface;
use Jerry\QueryBuilder\Statements\Filters\Where;

class Builder implements BuilderInterface
{
    /** @var ConnectorInterface */
    private $connection;

    /** @var \PDOStatement */
    private $statement;

    /** @var string */
    private $sql;

    /** @var QueryInterface */
    private $query;

    /** @var string */
    private $filterSql;

    /** @var array */
    private $values;

    public function __construct(ConnectorInterface $connection)
    {
        $this->connection = $connection;
    }

    public function getResults(QueryInterface $query): array
    {
        $this->query = $query;
        return [];
    }

    private function buildSql(): void
    {
    }

    private function buildFilters(array $filters = [], string $filterSql = ""): void
    {
        if (! count($filters)) {
            $filters = $this->query->getFilters();
        }

        $iterator = new \ArrayIterator($filters);

        while ($iterator->valid()) {
            $filter = $iterator->current();

            $iterator->next();
        }
        /** @var FilterInterface $filter */
        foreach ($filters as $key => $filter) {
            unset($filters[$key]);

            if ($filter instanceof Where) {
                // WHERE foo = bar
                $filterSql .= "WHERE ? ? ?";
            }
        }
    }

    public function getConnection(): ConnectorInterface
    {
        return $this->connection;
    }

    public function setConnection(ConnectorInterface $connection): void
    {
        $this->connection = $connection;
    }

    public function getSql(): string
    {
        return $this->sql;
    }
}