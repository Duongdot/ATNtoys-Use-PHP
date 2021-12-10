<div class="container">
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
			                   
    <!--Display product-->
while($row = pg_fetch_assoc($result)){
	?>
	<div class="col-4">
        <div class="card">
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
      }
    }
  }
}
?>
</div>
