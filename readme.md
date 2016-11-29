#greenapp go go go!

## energyplus setup

to get started you need to install energy plus. Run the following command **after** setting up your Laravel - see below.

It bash script is written assuming ubuntu 14.04

1. `sudo energyplus.sh`
1. if that doesn't work, try `sudo bash energyplus.sh`
1. install in default directory /usr/local
1. symbolic link location in default directory /usr/local/bin
1. restart your vm or computer

Your nginx and php must also be configured to allow file uploads 5MB or larger:

1. add or modify the following block `client_max_body_size 100M;` to the http context of `/etc/nginx/nginx.conf`
1. check your php ini file to make sure the upload file size limit is 5MB or greater `grep -E "upload_max_filesize|memory_limit|post_max_size" /etc/php5/fpm/php.ini`

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

You must do the following:

1. run composer install 
1. create your own .env
1. run the following command to give composer permission to install github.com/aymanrb/php-unstructured-text-parser `sudo chown -R $USER $HOME/.composer`

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
