<?php
declare(strict_types=1);

namespace Jerry\QueryBuilder\Statements\Group;

use Jerry\Interfaces\StatementInterface;

class Group implements StatementInterface
{
    /** @var StatementInterface[] */
    private $statements = [];

    public function __construct(StatementInterface ...$statements)
    {
        $this->setStatements($statements);
    }

    public function getStatements(): array
    {
        return $this->statements;
    }

    public function setStatements(StatementInterface ...$statements): void
    {
        $this->statements = $statements;
    }
}