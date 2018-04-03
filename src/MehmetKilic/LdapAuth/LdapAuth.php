<?php
namespace MehmetKilic\LdapAuth;

use GuzzleHttp\Client;

class LdapAuth{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(){

  }

  public static function getConnect($url, $ldapApiKey, $email, $password){

    if( $email != null and $password != null ){
      $message        = array();
      $paramsBody     = '{"username":"'.$email.'", "password":"'.$password.'"}';
      $paramsHeader   = array(
        "apikey"        => $ldapApiKey,
        "Content-Type"  => "application/json"
      );

      $user = LdapAuth::ldapConnect($url, $paramsHeader, $paramsBody, $email, $password);
      header("HTTP/1.1 200 OK");
      return $user;
    }
    else {
      header("HTTP/1.1 401 Unauthorized");
      return false;
    }
  }

  protected static function ldapConnect($url, $headers, $body, $mail, $password){
    try{
      $client = new Client();
      $result = $client->post($url, [
        'body'    => $body,
        'headers' => $headers
      ]);
      $content  = $result->getBody();
      $content  = $content->read(1024);
      $content  = json_decode($content);
      $user     = LdapAuth::convertUser($content, $mail, $password);
    }catch(\Exception $exception){
      $user = false;
    }
    return $user;
  }

  protected static function convertUser($userArr, $mail, $password){
    if( $userArr != null and $mail != null and $password != null ){
      $getUser = Users::where('email', $userArr->mail)->first();

      // Eğer hesap yok ise oluşturuyoruz
      if( count($getUser) == null ){
        $addUser = Users::create([
          "id"                => $userArr->employeeID,
          "name_surname"      => $userArr->displayName,
          "email"             => $userArr->mail,
          "password"          => Hash::make($password),
          "status"            => 1
        ]);

        // Ve oturumu başlatıyoruz
        $user = Users::find($addUser->id);
        Auth::login($user);
      }
      else {
        return false;
      }
    }
  }
}
?>
