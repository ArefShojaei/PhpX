<?php

namespace PhpX\Components\Routing;

use Closure;
use PhpX\Components\Console\{
    Provider,
    Command
};


trait Router {
    use Route;
    
    private array $commands = [];
    
    private string $commandPrefix = "";

    private array $CommandParams = [];


    private function addCommand(string $command, Closure|Command $callback): void {
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
            if ($provider instanceof Closure) {
                $provider();
            }

            if ($provider instanceof  Provider) {
                $providerInstance = new $provider;

                $providerInstance->handle();
            }
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
    
    private function executeCommand(Closure|Command $callback): void {
        if ($callback instanceof Command) {
            $commandInstance = new $callback;

            echo $commandInstance->exec($this->CommandParams);
        }
        
        if ($callback instanceof Closure) {
            echo call_user_func($callback, ...$this->CommandParams);
        }
    }
}