<?php
declare(strict_types=1);

namespace Jerry\Adapters\MySql\Config;

interface ConfigInterface
{
    /**
     * @return string
     */
    public function getHost(): string;

    /**
     * @return string
     */
    public function getDatabase(): string;

    /**
     * @return string
     */
    public function getUsername(): string;

    /**
     * @return string
     */
    public function getPassword(): string;
}