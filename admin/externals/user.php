<?php

class User extends Main{
  //changing echo array values

  public $id;
  public $email;
  public $mobile;
  public $mobile_otp;
  public $username;
  public $password;
  public $permission;
  

  public static function found_user($table,$fields){

    $array = self::query("SELECT * FROM $table WHERE $fields");
    
    return $array;
  }

 
  //this is for a universal create method *start
}
?>