<?php

class Session{

    public function __construct(){
        session_start();
    }
  public function login_condition($user_found){
     
     if($user_found){
         $_SESSION['id'] = $user_found->id;//this is for get id in our session
         $_SESSION['username'] = $user_found->username;
     }
  }
  public function logout_condition(){
      if(isset($_SESSION['id'])){
          unset($_SESSION['id']);
      }
  }


}
$session = new Session();
?>