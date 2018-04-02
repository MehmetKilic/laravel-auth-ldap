# Laravel LDAP Authentication

Laravel Package LDAP Authentication.

## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require": {
        "mehmetkilic/laravel-auth-ldap": "dev-master"
    }
}
```

```bash 
$ composer update
```

## Usage

```php
$connect = new MehmetKilic\LdapAuth\LdapAuth;
$status  = $example->connectLDAP('server_url');
// > return LDAP user detail 
```

## Licence

MIT
