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

## getConnect ( Türkçe )

```php
Fonksiyon 4 adet parametre alır, 
1 - LDAP Sunucu adresi
2 - LDAP Sunucu API KEY değeri
3 - Kullanıcı LDAP kullanıcı adı
4 - Kullanıcı LDAP şifresi

Gönderimi sağlanan 4 parametre doğrultusunda LDAP bağlantısını sağlamak adına format düzenlenir ve bilgiler ldapConnect metoduna gönderilir.

```

## ldapConnect ( Türkçe )

```php
Fonksiyon 5 adet parametre alır, 
1 - LDAP Sunucu adresi
2 - İstek için header bilgisi
3 - İstek için body bilgisi
4 - Kullanıcı LDAP kullanıcı adı
5 - Kullanıcı LDAP şifresi

Tüm bu bilgileri bizim tekrardan girmemize gerek yok, getConnect metodu bizim yerimize bu bilgileri ilgili formata zaten soktu ve isteği yerimize gerçekleştirdi.
Aslında sistemin en önemli noktası da bu metod. Çünkü LDAP sunucusuna istek bu metod üzerinden yapılıyor, eğer bilgilerimiz doğru ise sistem kullanıcı bilgilerini döndürecektir.
Bilgiler yanlış ise "false" dönecektir değerimiz.

```


## convertUser ( Türkçe )

```php
Fonksiyon 3 adet parametre alır, 
1 - Kullanıcı bilgileri
2 - Kullanıcı LDAP kullanıcı adı
3 - Kullanıcı LDAP şifresi

Kullanıcı girişi gerçekleşmişse bu fonksiyonumuz en son çalışır ve Ldap sunucusu tarafından gönderilen kullanıcı bilgilerini Laravelde rahat kullanmamız için uyarlar.
Bir diğer görevi ise Laravel kendi authentication yönetimine sahip bir sistemdir, ve bu sistem dışarıdan login işlemlerini desteklemez driver geliştirilmediği sürece.
Bu noktada eğer kullanıcı başarılı bir oturum açma işlemi gerçekleştirmişse onu kendi veritabanımızda kayıt edip ondan sonra o kullanıcıya oturum açıyoruz.

Bu noktada bu kullanıcıya bağımlı işlemlerin nasıl yönetileceği noktasında ise LDAP tarafında kullanıcının standart bir employeeID değeri mevcut database üzerinde ki işlemleri bu 
benzersiz id ye göre yapmak mantıklı olacaktır.

```

## Licence

MIT
