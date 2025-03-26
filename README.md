<h1 align='center'>PhpX Library</h1>

```php
use PhpX\Components\Console\App;


$app = new App;

$app->command("welcome", function() {
    return "Welcome command!";
});

$app->launch();
```