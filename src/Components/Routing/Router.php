<?php

namespace PhpX\Components\Routing;

use Closure;


trait Router {
    use Route;
    
    private array $commands = [];
    
    private string $commandPrefix = "";

    private array $CommandParams = [];


    private function addCommand(string $command, Closure $callback): void {
        $this->commands[trim($this->commandPrefix . $command)] = $callback;
    }

    private function addCommandParams(array $params): void {
        foreach ($params as $key => $value) {
            if (is_int($key)) continue;

            $this->CommandParams[$key] = $value;
        }
    }

    private function isMatchedCommand(array $params): bool {
        return count($params) ? true : false;
    }

    private function applyProviders(): void {
        foreach ($this->providers as $provider) {
            call_user_func($provider);
        }
    }

    private function findCommand(string $command): array {
        foreach ($this->commands as $cmd => $action) {
            $pattern = "/^" . str_replace(["{", "}"], ["(?<", ">(\w)+)"], $cmd) . "$/";

            preg_match($pattern, $command, $matches);

            if (count($matches)) break;
        }

        return [$matches, $action];
    }
    
    private function executeCommand(callable $callback): void {
        echo call_user_func($callback, ...$this->CommandParams);
    }
}