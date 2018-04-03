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
use MehmetKilic\LdapAuth\LdapAuth as LdapAuth;

$connect = LdapAuth::getConnect("server_url", "server_api_key", "email_or_username", "password");
if( $connect->status == 200 ){
  // if the login is successful
  return "Success";
}
else{
  return "Error";
}
 
```

## Methods

```php
getConnect
ldapConnect
convertUser
```

## Licence

MIT
