<?php

class Database{
public $conn;

public function __construct(){
  $this->connect_db();
}
//normalconnection  method
public function connect_db(){
   
  // $this->conn = mysqli_connect("localhost" , "root" , "" , "gallery");
  //change OOP connection
  $this->conn = new mysqli("localhost" , "root" , "" , "honeycomb");
  if($this->conn->errno){
    echo "Connection failed".$this->conn->error;
   }
 }
  //this is for a query compression method
public function query($sql){
  $users_result = $this->conn->query($sql);//mysqli=$this->conn
  $this->confirm_query($users_result);//this is called confirm query
  return $users_result;
}
//this is cheking for confirmation
public function confirm_query($users_result){
  if(!$users_result){
    echo "Query failed".$this->conn->error;
  }
}
}

$database = new Database();

?>