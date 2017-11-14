<?php
declare(strict_types=1);

namespace Jerry\Interfaces\Container;

interface ContainerInterface
{
    public static function bind(string $interface, string $class): void;

    public static function get(string $interface);
}