<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Dery</title>
</head>

<body>
  

<div class="container-fluid" id="sessionproduct">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="h2">Product</h2>
          <div class="row row-cols-1 row-cols-md-3 g-4">
              
              <?php
              // 	include_once("database.php");
              $result = pg_query($conn, "SELECT * FROM public.product");

              if (!$result) { //add this check.
                die('Invalid query: ' . pg_error($conn));
              }


              while ($row = pg_fetch_array($result, PGSQL_ASSOC)) {
              ?>
            <div class="col">
              <div class="card h-100">
                <img src="./tree/img/<?php echo $row['Pro_image']?>" class="card-img-top" alt="..." width="50" height="50" >
                <div class="card-body">
                  <h5 class="card-title"><?php echo  $row['Product_Name']?></h5>
                  <p class="card-text"><?php echo  $row['Price']?></p>
                  <p class="card-text"><?php echo  $row['DetailDesc']?></p>
                  <a href="#" class="btn btn-primary">Buy</a>
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
 
        
  
</body>
</html>

