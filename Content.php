  <?php
  include_once("conection.php");
  ?>
  <!-- category-->
  <div class="row">
    <div class="col-sm-4">
      <h3>Category</h3>
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Toys Lego
            </button>
          </h2>   
          <ul class="list-group">
            <li class="list-group-item">LEGO Education</li>
            <li class="list-group-item">LEGO Ninjago</li>
            <li class="list-group-item">LEGO City</li>
          </ul>

        </div>
      </div>
    </div> <!-- end category-->

    <!-- slide ad-->
    <div class="col-sm-8">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./tree/img/slide3.png" class="d-block w-100" alt="slide1" width="500" height="500">
            <div class="carousel-caption d-none d-md-block">
              <h5>Wellcome to Dery</h5>
              <p>Have a good day</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./tree/img/slide4.png" class="d-block w-100" alt="slide2" width="500" height="450">
            <div class="carousel-caption d-none d-md-block">
              <p>SALE 20%</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./tree/img/slide2.png" class="d-block w-100" alt="slide3" width="500" height="450">
            <div class="carousel-caption d-none d-md-block">
              <p>SALE 50%</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!--end slide ad-->
  </div>
  </div>
  </div>


  <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Product</h2>
                        <div class="product-carousel">
                        
                        <!--Load Product DB -->
                           <?php
						  // 	include_once("database.php");
		  				   	$result = pg_query($conn, "SELECT * FROM public.product");
			
                   if (!$result) {
                    echo "An error occurred.\n";
                    exit;
                  }       
                  while ($row = pg_fetch_assoc($result)) {
                  ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="./tree/img/<?php echo $row['pro_image']?>" width="150" height="150">
                                    <div class="product-hover">
                                        <a href="?page=cart" class="add-to-cart-link" ><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    </div>
                                </div>
                                
                                <h2><a href="?page=quanly_chitietsanpham&ma=<?php echo  $row['product_id']?>"><?php echo  $row["product_name"]?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins>Price:$<?php echo  $row['price']?></ins> 
                                </div> 
                            </div>
                
                <?php
                }
                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <div class="container-fluid" id="sessionproduct">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="h2">Best Sellers</h2>
          <div class="row row-cols-1 row-cols-md-3 g-4">
              <!--Load Product DB -->
              <?php
              // 	include_once("database.php");
              $result = pg_query($conn, "SELECT * FROM public.product");

              if (!$result) { //add this check.
                die('Invalid query: ' . pg_error($conn));
              }     
            while ($row = pg_fetch_assoc($result)) {
            ?>
            <div class="col">
              <div class="card h-100">
                <img src="./tree/img/<?php echo $row ['pro_image'] ?>" class="card-img-top" alt="..." width="50" height="50" >
                <div class="card-body">
                  <h5 class="card-title"><?php echo  $row['product_name']?></h5>
                  <p class="card-text">Price:$<?php echo  $row['price']?></p>
                  <p class="card-text"><?php echo  $row['detaildesc']?></p>
                  <a href="?page=cart" class="btn btn-primary">Buy</a>
                </div>
              </div>
            </div>
            <?php
				}
				?>

          </div>
        </div>
      </div>
    </div>
  </div>

 
  


  <!-- End product widget area -->