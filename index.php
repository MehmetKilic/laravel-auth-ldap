<?php
namespace Index;

use MehmetKilic\LdapAuth\LdapAuth as LdapAuth;

require __DIR__.'/vendor/autoload.php';

class Index {

  public function __construct(){
    return 'test';
  }

  public function index(){
    // Laravel kullanımı için .env dosyasından ayarlar çekilebilir
    $test = LdapAuth::getConnect(
      "https://test.test/ldap/v1/person/authenticate",
      "5cb44dc56119f4abf36ccddasd3d3e32",
      "mehmet.kilic",
      "123456789"
    );
    var_dump($test);
  }
}

$run = new Index;
return $run->index();
