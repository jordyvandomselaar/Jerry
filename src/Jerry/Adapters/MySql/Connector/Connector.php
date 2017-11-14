<?php
declare(strict_types=1);

namespace Jerry\Adapters\MySql\Connector;

use Jerry\Adapters\MySql\Config\ConfigInterface;
use Jerry\Interfaces\ConnectorInterface;

class Connector implements ConnectorInterface
{
    /** @var PDO */
    private $connection;

    /** @var ConfigInterface */
    private $config;

    public function __construct(ConfigInterface $config)
    {
        $this->setConfig($config);
    }

    private function connect(): void
    {
        $dsn = sprintf("mysql:dbname=%s;host=%s", $this->getConfig()->getDatabase(), $this->getConfig()->getHost());

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $pdo = new PDO(
            $dsn,
            $this->getConfig()->getUsername(),
            $this->getConfig()->getPassword(),
            $options
        );

        $this->setConnection($pdo);
    }

    public function getConnection(): PDO
    {
        if (! $this->connection) {
            $this->connect();
        }

        return $this->connection;
    }

    public function setConnection(PDO $pdo): void
    {
        $this->connection = $pdo;
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    public function setConfig(ConfigInterface $config): void
    {
        $this->config = $config;
    }
}