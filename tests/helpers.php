<?php

namespace Tests;


function isImplementsInterface(string $class, string $interface): bool {
    $interfaces = class_implements($class);

    return $interfaces[$interface] ? true : false;
}