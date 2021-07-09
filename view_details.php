<?php
   include 'externals/header.php';
   //view partcular select product
   if(isset($_GET['id'])){
  $id = $_GET['id'];
  $products = Product::show_by_id('products',$id);
  }
  //add session in to cart page;
  if(isset($_POST["addcart"]))
  {
      if($_SESSION["cart"])
      {
        $id_array = array_column($_SESSION["cart"],'id');

        if(!in_array($_GET['id'],$id_array))
        {
           $index = count($_SESSION["cart"]);
           $item = array(
            'id' => $_GET['id'],
            'product_image' =>$_POST['product_image'],
            'product_name' => $_POST['product_name'],
            'product_price' =>$_POST['product_price'],
            'product_qty' =>$_POST['product_qty'],
        );
            $_SESSION["cart"][$index] = $item;
            echo "<script>
            alert('product added...')
            </script>";
            header('location:cart.php');
        }
        else{
            echo "<script>alert('Already added...')</script>";
        }
      }
      else{
          $item = array(
              'id' => $_GET['id'],
              'product_image' =>$_POST['product_image'],
              'product_name' => $_POST['product_name'],
              'product_price' =>$_POST['product_price'],
              'product_qty' =>$_POST['product_qty']
          );
          $_SESSION["cart"][0] = $item;
           echo "<script>
           alert('product added...')
           </script>";
           header('location:cart.php');
      }
  }
?>
<div class="login-wrapper">
    <center><h4>Product Details</h4></center>
</div>
<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST"  enctype="multipart/form-data">
<div class="container">
<div class="row" style="margin-top: 50px;">
<div class="col-sm-6">
<img src="images/products/<?php echo $products->product_image;?>" alt="" style="width: 300px;margin-left:200px;">
</div>
<div class="col-sm-6">
<h5>Product name:<b><?php echo $products->product_name;?></b></h5><br>
<h6>Product Details:<p><?php echo $products->product_details;?></p></h6><br>
<h6>Product Price:<strong><?php echo $products->product_price;?>RS</strong></h6><br>
<h6>Quantity:</h6><input type="number" name="product_qty" required ><br>
<input type="hidden" name="product_image" value="<?php echo $products->product_image;?>">
<input type="hidden" name="product_name" value="<?php echo $products->product_name;?>">
<input type="hidden" name="product_price" value="<?php echo $products->product_price;?>">
    

<br>
<button type="submit" class="btn btn-default" name="addcart">Add Cart</button>
</div>
</div>
</div>
</div>
</form>