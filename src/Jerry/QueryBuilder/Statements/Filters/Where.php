<?php
declare(strict_types=1);

namespace Jerry\QueryBuilder\Statements\Filters;

use Jerry\Interfaces\Statements\FilterInterface;

class Where implements FilterInterface
{
    /**
     * @var string
     */
    private $column;

    /**
     * @var string
     */
    private $operator;

    /**
     * @var string
     */
    private $value;

    public function __construct(string $column, string $operator, string $value)
    {
        $this->column = $column;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function getColumn(): string
    {
        return $this->column;
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}