<div class="container">
    <h1><u>All Product</u></h1>
</div>
<div class="container">
    <?php

						              include_once("connection.php");
                                      if (isset($_POST["txtSearch"])) {
                                          $data = $_POST['txtSearch'];
                                            if($data=="")
                                            {
                                              echo "<script>alert('Please Enter Data!')</script>";
                                              echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                                            }
                                           else {
		  				   	        $result = pg_query($conn, "SELECT * FROM product where product_id like '%".$data."%' or Product_Name like '%".$data."%'");
    			                if(pg_num_rows($result)==0)
                          {
                            echo  "<script>alert('No find data. Please Enter Again!')</script>";
                            echo '<meta http-equiv="refresh" content="0;URL=index.php">';
                          }
                          else {
                           if (!$result) { //add this check.
                                die('Invalid query: ' . pg_error($conn));
                            }
                            else {
			                    while($row = pg_fetch_assoc($result)){
				                  ?>
    <!--Display product-->
    <div class="container-fluid" id="sessionproduct">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <img src="./tree/img/<?php echo $row ['pro_image'] ?>" class="card-img-top" alt="..." width="50" height="50" >
                <div class="card-body">
                  <h5 class="card-title"><?php echo  $row['product_name']?></h5>
                  <p class="card-text"><?php echo  $row['price']?></p>
                  <p class="card-text"><?php echo  $row['detaildesc']?></p>
                  <a href="?page=cart" class="btn btn-primary">Buy</a>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php
		}
      }
    }
  }
}
?>
</div>