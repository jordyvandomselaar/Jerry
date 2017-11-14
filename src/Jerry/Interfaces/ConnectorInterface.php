<?php
declare(strict_types=1);

namespace Jerry\Interfaces;

use PDO;

interface ConnectorInterface
{
    public function getConnection(): PDO;
}