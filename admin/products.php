<?php
ob_start();
 include "externals/sidebar.php"; 
 include 'externals/header.php'; 
 include "externals/init.php";?>


<?php 

$products = Product::show_all('products');

if(isset($_GET['delete'])){
    $delete_product = new Product();
    $delete_product->id = $_GET['delete'];
    $delete_product->delete_img('products');
    header('location:products.php');
   

}

?>
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Bar Chart -->
<div class="card shadow mb-4">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">View All Products</h6>
       </div>
       <div class="card-body">
       
       <table class="table table-bordered table-hover">
             <thead >
                 <tr>
                     <th>Id</th>
                     <th>Product Name</th>
                     <th>Product Image</th>
                     <th>Product Details</th>
                     <th>Product Price</th>
                     <th>Product Status</th>
                     <th>Edit</th>
                     <th>Delete</th>
                 </tr>
             </thead>
             <tbody>
             <?php foreach($products as $product):?>
                <tr>
                    <td><?php echo $product->id?></td>
                    <td><?php echo $product->product_name;?></td> 
                    <td><?php echo $product->product_image;?></td>
                    <td><?php echo $product->product_details;?></td> 
                    <td><?php echo $product->product_price;?></td>  
                    <td><?php echo $product->product_status;?></td> 
                    <td><a href="edit_product.php?edit=<?php echo $product->id;?>">Edit</a></td>
                    <td><a href="products.php?delete=<?php echo $product->id;?>">Delete</a></td>
                    
                </tr>
                <?php endforeach;?>
          
             </tbody>
         </table>
         </div>
     </div>
   </div>


  