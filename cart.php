<?php
ob_start();
   include 'externals/header.php';

  if(isset($_SESSION["cart"])){
    $carts = $_SESSION["cart"];

  }

  if(isset($_GET['remove'])){
     $id = $_GET['remove'];

   foreach($carts as $keys=>$values){
     if($values['id']==$id){
        unset($_SESSION['cart'][$keys]);
     }
   }
  }
?>

<div class="login-wrapper">
    <center><h4>Cart Products</h4></center>
</div>

<table class="table table bordered" style="margin-top: 20px;">
   <tr>
      <th>Product Image</th>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Quantity</th>
      <th>Total</th>
      <th>Remove</th>
   </tr>
   <tbody>
      <?php 
  if(!empty($carts)){
     $all_total=0;
     foreach($carts as $keys=>$values){
        $total = $values['product_price'] * $values['product_qty'];
        $all_total+=$total;
        echo "
            <tr>
              <td><img src='images/products/{$values["product_image"]}' width='50px'></td>
              <td>{$values["product_name"]}</td>
              <td>{$values["product_price"]}</td>
              <td>{$values["product_qty"]}</td>
              <td>{$total}</td>
              <td><a href='cart.php?remove={$values['id']}'>Remove</a>
            </tr>
             ";
     }
         echo "
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>{$all_total}</td>
              </tr>
         
              ";
     
   }
     else{
        header('location:index.php');
     
  }

    ?>    
   </tbody>
</table>