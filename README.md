
Awin Demo by Imran Aghayev
===========

Features
-------------
* Uses composer and autoloading
* Users Interfaces and Abstract classes (for Argv/Argc for example)
* Trying to implment IoC via Dependency Injection
* CurrencyConverter uses own direct Dependency Injection through Setter method
* Demonstration of using xpath query
* Using yaml for config
* Using phpunit for tests

Using scenario
-------------
```
composer update
php index.php -m 1
php index.php -m 2
```

Testing scenario
-------------
```
composer require  phpunit/phpunit
./vendor/bin/phpunit tests/
```