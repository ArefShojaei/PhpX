<h1 align='center'>PHP Console App</h1>

```php
<?php

use PhpX\Components\Console\App;

$app = new App;

$app->command("welcome", function() {
    return "Welcome command!";
});

$app->launch();
```

## **Installation**

#### Using Composer
```bash
composer create-project arefshojaei/php-x
```

#### Using GIT
```bash
git clone https://github.com/ArefShojaei/PhpX
```

<br/>

> Add Provider that run before exact command
```php

# First method
$app->use(function() { ... });

# Second method
use PhpX\Components\Console\Provider;

class ExampleProvider extends Provider {
    public function handle() { ... }
}

$app->use(new ExampleProvider);
```

<br/>

> Add Command
```php
# First method
$app->command("help", function() { ... });

# Second method
use PhpX\Components\Console\Command;

class ExampleCommand extends Command {
    public function exec() { ... }
}

$app->command("help", new ExampleCommand);
```


> Get command params
* [COMMAND] "users { id }"
* [COMMAND] "help --{ command }"
* [COMMAND] "link { url } { format }"
```php
$app->command("users {id}", function($id) { ... });

$app->command("help {command}", function($command) { ... });

$app->command("link {url} {format}", function($url, $format) { ... });
```



> Console Utility to show message with color
``` php
use PhpX\Utils\Console\Console;

echo Console::log("My message") . PHP_EOL; # [LOG] My message
echo Console::info("My message") . PHP_EOL; # [INFO] My message
echo Console::warn("My message") . PHP_EOL; # [WARN] My message
echo Console::error("My message") . PHP_EOL; # [ERROR] My message
```

> View Utility to show table content
``` php
use PhpX\Utils\View\ViewBuilder;

$app->command("welcome", function() {
    return (new ViewBuilder)
        ->addHeader()
        ->addCell(title: "Cell")
        ->addSeparator()
        ->addFooter()
        ->build();
});
```
