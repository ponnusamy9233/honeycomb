<?php

class Product extends Main{
    public $id;
    public $product_name;
    public $product_price;
    public $product_image;
    public $product_details;
    public $product_status;
    public $filename;
    public $tmp_file;



    public function upload_image($file){
       $this->filename = $file['name'];
        $this->tmp_file = $file['tmp_name'];

        move_uploaded_file($this->tmp_file,"../images/products/$this->filename");

        $table = 'products';
        $fields = "product_name,product_details,product_price,product_image,product_status";
        $values = "'$this->product_name','$this->product_details','$this->product_price','$this->filename','$this->product_status'";
        $this->create($table,$fields,$values);
        
       
 
     }
     public  function delete_img($table){
           if($this->delete($table)){
               $target ="../images/products/$this->filename";
               unlink($target);
               header('location:products.php');
 
           }
     }
     

}
?>