<?php

class Main {
    

//to use static function omit to another page ref :$user = new User();
// to use static function in same page (self::)defined;
//to us basic function ($this) defined;
  public static function show_all($table){
    return self::query("SELECT * FROM $table");
        
      }
    
      public static function show_by_id($table,$id){
        $array =  self::query("SELECT * FROM $table WHERE id='$id'");
        return array_shift($array);
      }
      public static function query($sql){
        global $database;
        $result = $database->query($sql);
        $array = [];
        while($row = mysqli_fetch_assoc($result)){
          $array[] = self::auto_loop($row);
        }
        return $array;
      }
    
      public static function auto_loop($row){
          $class = get_called_class();
        $user = new $class;
    
        foreach($row as $name => $value){
          $user->$name = $value;
        }
        return $user;
    
      }
      public function create($table,$fields,$values){
        global $database;
        $sql = "INSERT INTO $table ($fields) VALUES($values)";
        if($database->query($sql)){
          // $this->id = mysqli_insert_id($database->conn);
              return true;
          //*end create universal method
        }
        else{
          return false;
        }
        
      }
      // * update universal method
      public function update($table,$fields){
        global $database;
        $sql = "UPDATE $table SET $fields WHERE id = $this->id";
        $database->query($sql);
        return mysqli_affected_rows($database->conn) == 0 ? true : false;
      }
      //delete universal method
      public function delete($table){
        global $database;
        $sql = "DELETE FROM $table WHERE id = $this->id";
        if($database->query($sql)) {
          return true;
        }
        else{
          return false; 
        }
      }
      public static function verify_user($username,$password){
        $array = self::query("SELECT * FROM register WHERE username='$username' AND password='$password'");
        return array_shift($array);
      }
        
     
      }



?>