# Laravel Lighthouse Package Base
## A base package for developing laravel plugins that require lighthouse-php
![Test Coverage Badge](./cover-badge.svg)

# Installation
## Requirements
* php 7.4

## Setup
* Clone the repository
* Replace all occurences of "ImBrett" with your name
* Replace all occurences of "AppName" with your package name
* Install the dependancies. This will also install the git pre-commit hooks
```shell
composer install
```

# Usage
## Building your project
Build your package with `composer build` This command will:
* Be run on every commit to ensure code quality
* Lint your code with [phpcs](https://www.github.com/squizlabs/php_codesniffer)
* Test your code and generate coverage with [phpunit](https://www.github.com/phpunit/phpunit)
* Generate a [phploc](https://www.github.com/phploc/phploc) log file
* Generate a code coverage badge with [php-coverage-badger](https://www.github.com/jaschilz/php-coverage-badger)
* Generate your documentation with [phpdox](https://www.github.com/theseer/phpdox)


## Hosting your docs
The generated documentation is placed in `build/docs/html`, you may easily use any static site generator to host this folder with little setup.

# Configuration
see the [Config](config/config.php) file

# Contributing
See the [Contributing](CONTRIBUTING.md) file

# Authors
* __ImBrett__ - _initial work_ - [github](https://github.com/ImBrett)

# License
This package is licensed under the [MIT License](./LICENSE)



