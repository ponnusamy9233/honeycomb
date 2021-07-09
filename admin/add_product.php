<?php ob_start();?>

<?php include "externals/sidebar.php"; ?>
<?php include 'externals/header.php'; ?>
<?php include "externals/init.php";?>

<?php

if(isset($_POST['publish'])){
    $product = new Product();
    $product->product_name = $_POST['product_name'];
    $product->product_details = $_POST['product_details'];
    $product->product_price= $_POST['product_price'];
    $product->product_status = $_POST['product_status'];
    $product->upload_image($_FILES['image']);
   
}



?>
                   <!-- Bar Chart -->
        <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Add products</h6>
</div>
<div class="card-body">

<form action="add_product.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="title">Product Name</label>
<input type="text" value="" class="form-control" name="product_name">
</div>
<div class="form-group">
<label for="title">Product Description</label>
<input type="text" value="" class="form-control" name="product_details">
</div>
<div class="form-group">
<label for="title">Product Price</label><br>
<input type="number" value="" class="form-control" name="product_price">
</div>
<div class="form-group">
<label for="product_image">Product Image</label><br>
<img width='200px' src="../images/products/" alt="" srcset=""><br><br>
<input type="file" name="image">
</div>
<div class="form-group">
<label for="title">Product Status</label>
<select name="product_status" class="form-control">
    <option value="published">published</option>
    <option value="unpublished">unpublished</option>
</select>
</div>

<div class="form-group">
<input type="submit" value="Publish Product" class="btn btn-primary" name="publish">
</div>
</form>

</div>
          </div>
        </div>

<?php 

              

?>
