OSSPID is a PHP library which provides authentication facilities with OSSPID service.

Requirements
============

PHP versions and extensions
---------------------------

- `PHP >=5.6.0`

Installation
============

Official installation method is via composer and its packagist package [rabbee/osspid](https://packagist.org/packages/rabbee/osspid).

```
$ composer require rabbee/osspid
```

Setup & Configuration
=====================

No complex configuration is required for setting up this package. Only need to add few lines to `config/service.php` file for fetching credentials from `env`. 

```php
'OSSPID' => [
                'authUrl' => env('OSSPID_AUTH_URL'),
                'clientId' => env('OSSPID_CLIENT_ID'),
                'clientSecretKey' => env('OSSPID_CLIENT_SECRET_KEY'),
                'callBackUrl' => env('PROJECT_ROOT').'/osspid-callback',
                'baseUrlIp' => env('OSSPID_CLIENT_BASE_URL_IP'),
            ],
```

The keyword for fetching credentials from `env` can be changed as your desire. Just make sure the `indexes` of the `'OSSPID'` array are remained unchanged.


Usage
=====

The simplest usage of the library to generate `Redirect URL` would be as follows:

```php
<?php

$redirect_url = Osspid::getRedirectURL();
```
