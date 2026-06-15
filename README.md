# PhpX - PHP CLI Framework

**PhpX** یک کتابخانه خفیف، مدرن و انعطاف‌پذیر برای ساخت CLI (Command-Line Interface) با PHP است. با تمرکز بر سادگی و کارایی، PhpX شما را قادر می‌سازد کلیات پیچیده‌ای مثل Routing، Parameter Parsing، و Console Output را بدون زحمت مدیریت کنید.

**PhpX** is a lightweight, modern, and flexible PHP framework for building Command-Line Interface (CLI) applications with ease. Focus on your logic while PhpX handles routing, parameter parsing, and colorful console output.

---

## ✨ Features

- 🚀 **Lightweight & Fast** - Minimal dependencies, quick to load
- 🎯 **Simple Routing** - Intuitive command and parameter handling
- 🎨 **Colored Output** - Built-in console utilities with colors and formatting
- 📊 **Table Builder** - Create formatted tables for CLI output
- 🔌 **Middleware System** - Providers for pre-command logic
- 📦 **PSR-4 Compliant** - Standard PHP autoloading
- ✅ **PHP 8.0+** - Modern PHP syntax and features

---

## 📦 Installation

### Using Composer (Recommended)
```bash
composer create-project arefshojaei/php-x my-cli-app
cd my-cli-app
```

### Using Git
```bash
git clone https://github.com/ArefShojaei/PhpX.git
cd PhpX
composer install
```

---

## 🚀 Quick Start

### Basic Usage

Create an `app.php` file:

```php
<?php

use PhpX\Components\Console\App;

$app = new App;

// Define a simple command
$app->command("hello", function() {
    return "Hello from PhpX!";
});

// Launch the app
$app->launch();
```

Run from command line:
```bash
php app.php hello
# Output: Hello from PhpX!
```

---

## 📚 Core Concepts

### 1. Commands

Commands are the main building blocks. They can be defined using closures or command classes.

#### Using Closures
```php
$app->command("greet", function() {
    return "Welcome to PhpX!";
});
```

Run: `php app.php greet`

#### Using Command Classes
```php
use PhpX\Components\Console\Command;

class GreetCommand extends Command {
    public function exec(array $params): string {
        return "Welcome!";
    }
}

$app->command("greet", new GreetCommand);
```

---

### 2. Command Parameters

Capture dynamic parameters in your commands using the `{paramName}` syntax.

```php
// Single parameter
$app->command("greet {name}", function($name) {
    return "Hello, $name!";
});

// Multiple parameters
$app->command("link {url} {format}", function($url, $format) {
    return "URL: $url | Format: $format";
});

// Using in class-based commands
class UserCommand extends Command {
    public function exec(array $params): string {
        $userId = $params['id'] ?? 'unknown';
        return "User ID: $userId";
    }
}

$app->command("user {id}", new UserCommand);
```

Run examples:
```bash
php app.php greet John
# Hello, John!

php app.php link "https://example.com" json
# URL: https://example.com | Format: json

php app.php user 123
# User ID: 123
```

---

### 3. Providers (Middleware)

Providers run before command execution, useful for setup, validation, or logging.

#### Closure-based Providers
```php
$app->use(function() {
    echo "[LOG] Command starting..." . PHP_EOL;
});
```

#### Class-based Providers
```php
use PhpX\Components\Console\Provider;

class LoggingProvider extends Provider {
    public function handle(): void {
        echo "[Provider] Pre-command setup complete" . PHP_EOL;
    }
}

$app->use(new LoggingProvider);
```

Multiple providers execute in registration order.

---

### 4. Command Groups

Organize related commands with a prefix.

```php
$app->group("admin", function($app) {
    $app->command("users", function() {
        return "List users";
    });
    
    $app->command("config", function() {
        return "App configuration";
    });
});
```

Run:
```bash
php app.php admin users
# List users

php app.php admin config
# App configuration
```

---

## 🎨 Console Utilities

### Colored Output

Display messages with colors and labels using the `Console` utility:

```php
use PhpX\Utils\Console\Console;

echo Console::log("Regular message") . PHP_EOL;
// Output: [LOG] Regular message

echo Console::info("Information") . PHP_EOL;
// Output: [INFO] Information (blue)

echo Console::success("Operation successful") . PHP_EOL;
// Output: [SUCCESS] Operation successful (green)

echo Console::warn("Warning message") . PHP_EOL;
// Output: [WARN] Warning message (yellow)

echo Console::error("An error occurred") . PHP_EOL;
// Output: [ERROR] An error occurred (red)
```

#### Custom Labels
```php
echo Console::info("Custom info", "DEBUG") . PHP_EOL;
// Output: [DEBUG] Custom info (blue)
```

---

### Table Builder

Create formatted tables for displaying data:

```php
use PhpX\Utils\View\ViewBuilder;

$app->command("show-data", function() {
    return (new ViewBuilder)
        ->addHeader()
        ->addCell(title: "Name", length: 20)
        ->addCell(title: "Email", length: 30, isLast: true)
        ->addSeparator()
        ->addCell(title: "John Doe", length: 20)
        ->addCell(title: "john@example.com", length: 30, isLast: true)
        ->addFooter()
        ->build();
});
```

---

## 📋 Complete Example

Here's a practical example combining multiple features:

```php
<?php

use PhpX\Components\Console\App;
use PhpX\Components\Console\Provider;
use PhpX\Components\Console\Command;
use PhpX\Utils\Console\Console;
use PhpX\Utils\View\ViewBuilder;

$app = new App;

// Register a provider for logging
class LogProvider extends Provider {
    public function handle(): void {
        echo Console::info("Starting command execution...") . PHP_EOL . PHP_EOL;
    }
}

$app->use(new LogProvider);

// Simple info command
$app->command("info", function() {
    return Console::success("PhpX v1.6.2 - Modern PHP CLI Framework");
});

// User management commands
$app->group("user", function($app) {
    $app->command("list", function() {
        return (new ViewBuilder)
            ->addHeader(25)
            ->addCell("ID", 5)
            ->addCell("Name", 15, isLast: true)
            ->addSeparator()
            ->addCell("1", 5)
            ->addCell("John Doe", 15, isLast: true)
            ->addCell("2", 5)
            ->addCell("Jane Smith", 15, isLast: true)
            ->addFooter(25)
            ->build();
    });
    
    $app->command("create {name} {email}", function($name, $email) {
        return Console::success("User '$name' created with email: $email");
    });
});

$app->launch();
```

Run:
```bash
php app.php info
php app.php user list
php app.php user create "John" "john@example.com"
```

---

## 🏗️ Project Structure

```
PhpX/
├── src/
│   ├── Components/
│   │   ├── Console/          # Core CLI components
│   │   │   ├── App.php
│   │   │   ├── Command.php
│   │   │   ├── Provider.php
│   │   │   └── Contracts/
│   │   └── Routing/          # Command routing
│   │       ├── Router.php
│   │       └── Route.php
│   └── Utils/
│       ├── Console/          # Console utilities (colors, labels)
│       ├── Input/            # Input parsing
│       └── View/             # Table builder
├── tests/                    # Unit tests
├── composer.json
└── phpunit.xml
```

---

## 🧪 Testing

Run tests with PHPUnit:

```bash
composer test
# or
./vendor/bin/phpunit
```

---

## 📝 API Reference

### App Class

```php
$app = new App();

// Register a provider
$app->use(Closure|Provider $callback): void

// Register a command
$app->command(string $command, Closure|Command $callback): void

// Group related commands
$app->group(string $prefix, Closure $callback): void

// Start the application
$app->launch(): void
```

### Console Class

```php
Console::log(string $message, string $label = null): string
Console::info(string $message, string $label = null): string
Console::success(string $message, string $label = null): string
Console::warn(string $message, string $label = null): string
Console::error(string $message, string $label = null): string
```

### ViewBuilder Class

```php
$builder = new ViewBuilder();

$builder
    ->addHeader(int $length = 20, string $symbol = "-", int $align = STR_PAD_BOTH)
    ->addCell(string $title, int $length = 20, int $align = STR_PAD_BOTH, bool $isLast = false)
    ->addSeparator(string $symbol = "*", int $length = 20, int $align = STR_PAD_BOTH)
    ->addFooter(int $length = 20, string $symbol = "-", int $align = STR_PAD_BOTH)
    ->build(): string
```

---

## 🌟 Why Choose PhpX?

- **Zero Configuration** - Works out of the box
- **Intuitive API** - Easy to learn and use
- **Production Ready** - Used in real-world applications
- **Well Structured** - Clean, maintainable codebase
- **Active Development** - Regular updates and improvements

---

## 📄 License

MIT License - Feel free to use PhpX in your projects!

---

## 👨‍💻 Author

**ArefShojaei** - [GitHub](https://github.com/ArefShojaei) | [Email](mailto:arefshojaei82@gmail.com)

### Contributions

Contributions are welcome! Feel free to:
- Report bugs
- Suggest features
- Submit pull requests
- Improve documentation

---

## 📦 Packagist

PhpX is available on [Packagist](https://packagist.org/packages/arefshojaei/php-x)

```bash
composer require arefshojaei/php-x
```

---

## 🔗 Resources

- **GitHub**: https://github.com/ArefShojaei/PhpX
- **Packagist**: https://packagist.org/packages/arefshojaei/php-x
- **Documentation**: [See above]

---

## ⭐ Support

If you find PhpX helpful, please consider giving it a star on GitHub! ⭐

Your feedback and support help improve PhpX for everyone.
