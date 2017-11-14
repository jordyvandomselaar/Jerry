<?php
declare(strict_types=1);

namespace Jerry\Interfaces\Statements;

use Jerry\Interfaces\StatementInterface;

interface FilterInterface extends StatementInterface
{

    public function getColumn(): string;

    public function getOperator(): string;

    public function getValue(): string;
}