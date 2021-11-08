<div class="container">
    <h1><u>All Product</u></h1>
</div>
<div class="container">
    <?php

						              include_once("conection.php");
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
			                    while($row = pg_fetch_array($result)){
				                  ?>
    <!--Display product-->
    <div class="col-sm-3">
        <div class="card">
            <img src="./tree/img/<?php echo $row['pro_image']?>" style="width:100%">
            <h4 class="name"><a
                    href="?page=quanly_chitietsanpham&ma=<?php echo  $row['product_id']?>"><?php echo  $row['product_name']?></a>
            </h4>
            <div class="price"><ins>$ <?php echo  $row['price']?></ins> <del class="oldprice">
                    $<?php echo  $row['oldPrice']?></del></div>
            <p><button><a href="?page=cartfuntion&ma=<?php echo  $row['product_id']?>">Add to Cart</a></button></p>
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