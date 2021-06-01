# Laravel Lighthouse Package Base
## A base package for developing laravel plugins that require lighthouse-php
![Test Coverage Badge](./cover-badge.svg)
![Current Build Status](https://travis-ci.com/ImBrett/laravel-lighthouse-package-base.svg?branch=master)

# Installation
## Requirements
* php 7.4
* Docker
* Docker-compose

## Setup
* Clone the repository
* Build and start the containers
```bash
docker-compose up --build -d
```

# Usage

## CI pipeline
`composer ci` will run an entire build pipeline on your package including:
* Linting your code with [phpcs](https://www.github.com/squizlabs/php_codesniffer)
* Testing your code and generating coverage with [phpunit](https://www.github.com/phpunit/phpunit)
* Generating a [phploc](https://www.github.com/phploc/phploc) log file
* Generating a code coverage badge with [php-coverage-badger](https://www.github.com/jaschilz/php-coverage-badger)

By default, this command is run on every push, pull request, and commit no matter the branch. This ensures and enforces a strong level of code quality.
## Building your project
Build your package with `composer build`. This command will Generate your documentation with [phpdox](https://www.github.com/theseer/phpdox). By default this pipeline will run on each pull request and push to the master branch.

## Hosting your docs
The generated documentation is placed in `build/docs/html`, you may easily use any static site generator to host this folder with little setup. The default is to have it published to github pages.

## Using the alias
The provided alias is a convenience feature that runs your composer commands in the same context as the packages container. You can enable the alias with the command
```bash
source aliases.sh
```

# Configuration
see the [Config](config/config.php) file

# Contributing
Please see the following files if you want to contribute to this project:
* [Code of Conduct](.github/CODE_OF_CONDUCT.md)
* [Contributing](.github/CONTRIBUTING.md)

# Authors
* __ImBrett__ - _initial work_ - [github](https://github.com/ImBrett)

# License
This package is licensed under the [MIT License](./LICENSE)
