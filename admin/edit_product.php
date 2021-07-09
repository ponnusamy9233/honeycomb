<?php
ob_start();
 include "externals/sidebar.php"; 
 include "externals/header.php";
 include "externals/init.php";
 ?>

<?php
if(isset($_GET['edit'])){
    
   $product_id = $_GET['edit'];
$product =Product::show_by_id('products',$product_id);
}

if(isset($_POST['update'])){
    $product = new Product();
    $product->id = $_GET['update'];
    $product->product_name = $_POST['product_name'];
    $product->product_price = $_POST['product_price'];
    $product->product_details = $_POST['product_details'];
    $product->filename = $_FILES['image']['name'];
    $product->tmp_file = $_FILES['image']['tmp_name'];
    $product->product_status = $_POST['product_status'];

    move_uploaded_file($product->tmp_file,"../images/products/$product->filename");

    if(empty($product->filename)){
       
        $products = Product::show_by_id('products',$product->id);

        $product->filename = $products->product_image;
    }
 
    $product->update('products',"product_name='$product->product_name',product_price='$product->product_price',product_details='$product->product_details',product_image='$product->filename',product_status='$product->product_status'");
    header('location:products.php');
    
}

?>
                   <!-- Bar Chart -->
        <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Update products</h6>
</div>
<div class="card-body">

<form action="edit_product.php?update=<?php echo $product->id;?>" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">Product Name</label>
<input type="text" value="<?php echo $product->product_name;?>" class="form-control" name="product_name">
</div>
<div class="form-group">
<label for="title">Product Price</label><br>
<input type="number" value="<?php echo $product->product_price;?>" class="form-control" name="product_price">
</div>
<div class="form-group">
<label for="product_image">Product Image</label><br>

<img width='200px' src="../images/products/<?php echo $product->product_image;?>" 
alt="" srcset=""><br><br>

<input type="file" name="image">
</div>
<div class="form-group">
<label for="title">Product Details</label><br>
<input type="text" value="<?php echo $product->product_details;?>" class="form-control" name="product_details">
</div>
<div class="form-group">
<label for="title">Product Status</label>
<select name="product_status" class="form-control" >
    <option value="<?php echo $product->product_status;?>"><?php echo $product->product_status;?></option>
<?php
    if($product->product_status == 'published'){
     echo "<option value='unpublished'>unpublished</option>";
    }
    else{
      echo "<option value='published'>published</option>";
    }
    ?>
</select>
</div>

<div class="form-group">
<input type="submit" value="Update Product" class="btn btn-primary" name="update">
</div>
</form>

</div>
          </div>
        </div>

<?php 

              

?>
