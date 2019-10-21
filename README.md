# VideoShare

A tool to import Videos from different providers through a console command 

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites

  * PHP 7.2 or higher;
  * and the [usual Symfony application requirements][1].


### Installing

Steps to install application

```
$ git clone https://github.com/welpons/VideoShare.git
$ cd VideoShare
$ composer install
```

## Running the tests

```bash
php vendor/bin/phpunit
```

### Usage

```bash
$ cd VideoShare/
$ php app.php import <provider-name>
```

Example:

```bash
$ php app.php import glorf
```

## Authors

* **Felix Pons** 


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


[2]: https://symfony.com/doc/current/reference/requirements.html
