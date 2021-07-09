<?php
   include 'externals/header.php';

  
?>

<?php 
$products = Product::show_all('products');
?>
    <!-- end header section -->
    <!-- slider section -->
<div class="banner-slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="height:800px" >
      <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slider/slide1.jpg" class="d-block w-100" alt="..." >
    </div>
    <div class="carousel-item">
      <img src="images/slider/slide2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/slider/slide3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!-- end slider section -->
  </div>
  </div>
<br>  <!-- product section -->

  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Products
        </h2>
      </div>
    
      <div class="row">
      <?php foreach($products as $product): ?>
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="images/products/<?php echo $product->product_image;?>" alt="">
              <a href="view_details.php?id=<?php echo $product->id;?>" class="add_cart_btn">
                <span>
                  View Details
                </span>
              </a>
            </div>
            <div class="detail-box" align="center" style="color:blue;">
              <h5>
               <?php echo $product->product_name;?>
              </h5>
              <div class="product_info" style="margin-left:120px;">
                <h5>
                  <span>RS:</span> <?php echo $product->product_price;?>
                </h5>
               
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      
  </section>

  <!-- end product section -->

  
  <!-- footer section -->
 <?php include 'externals/footer.php'?>


</body>

</html>