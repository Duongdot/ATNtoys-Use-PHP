<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./tree/css/Style.css">

  <!-- fontAwsomae-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <!-- webicon -->
  <link rel="shortcut icon" href="./tree/img/logo1.png">


  <title>Dery</title>
</head>

<body>
 
	<?php
    include_once("conection.php");
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$result = pg_query($conn, "SELECT * FROM public.shops WHERE shop_id = '$id' ");
		$row = pg_fetch_assoc($result);
		$shop_name = $row ['shop_name'];
		$address = $row ['address'];
        $email = $row ['email'];
        $phone = $row['phone'];
	?>
	<div class="container">
		<h2>Updating Shop</h2>
					<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
								<label for="txtTen" class="col-sm-2 control-label">Shop ID(*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Shop ID" readonly 
									value='<?php echo $id; ?>'>
								</div>
						</div>	
					<div class="form-group">
								<label for="txtTen" class="col-sm-2 control-label">Shop Name(*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Shop Name" 
									value='<?php echo $shop_name; ?>'>
								</div>
						</div>
						
						<div class="form-group">
								<label for="txtMoTa" class="col-sm-2 control-label">Address(*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Address" 
									value='<?php echo $address; ?>'>
								</div>
						</div>
                        <div class="form-group">
								<label for="txtMoTa" class="col-sm-2 control-label">Email(*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" 
									value='<?php echo $email; ?>'>
								</div>
						</div>
                        <div class="form-group">
								<label for="txtMoTa" class="col-sm-2 control-label">Phone(*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtPhone" id="txtPhone" class="form-control" placeholder="Phone" 
									value='<?php echo $phone; ?>'>
								</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
								<input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Cancel" onclick="window.location='?page=shops_management'"/>
									
							</div>
						</div>
					</form>
		</div>
		<?php
	}
	else{
		echo '<meta http-equiv="refresh" content="0;URL=?page=shops_management"/>';
	}
	?>

<?php
	if (isset($_POST["btnUpdate"]))
	{
		$id = $_POST["txtID"];
		$shop_name = $row ["txtName"];
		$address = $row ["txtAddress"];
        $email = $row ["txtEmail"];
        $phone = $row["txtPhone"];
		$err = "";
		if($shop_name=="")
		{
			$err .="<li>enter category Name. please</li>"; 
		}
		if ($err!="")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
			$sq="SELECT * From public.shops where shop_id != '$id' and shop_name='$name'";
			$result = pg_query($conn,$sq);
			if (pg_num_rows($result)==0)
			{
				pg_query($conn,"UPDATE shops SET shop_name = '$shop_name', address = '$address', phone = '$phone', email = '$email' where shop_id = '$id'");
				echo '<meta http-equiv="refresh" content="0;URL=?page=shops_management"/>';
			}
			else
			{
				echo "<li>Duplicate category Name</li>";
			}
		}
	}
	?>
</body>
</html>










      