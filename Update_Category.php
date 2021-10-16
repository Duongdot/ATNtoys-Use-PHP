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
		$result = pg_query($conn, "SELECT * FROM public.category WHERE Cat_ID = '$id' ");
		$row = pg_fetch_array($result, pg_ASSOC);
		$cat_id = $row ['Cat_ID'];
		$cat_name = $row ['Cat_Name'];
		$cat_des = $row ['Cat_Des'];
	?>


	<div class="container">
		<h2>Updating Product Category</h2>
					<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
								<label for="txtTen" class="col-sm-2 control-label">Category ID(*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Catepgy ID" readonly 
									value='<?php echo $cat_id; ?>'>
								</div>
						</div>	
					<div class="form-group">
								<label for="txtTen" class="col-sm-2 control-label">Category Name(*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" 
									value='<?php echo $cat_name; ?>'>
								</div>
						</div>
						
						<div class="form-group">
								<label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" 
									value='<?php echo $cat_des; ?>'>
								</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
								<input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Cancel" onclick="window.location='?page=category_management'"/>
									
							</div>
						</div>
					</form>
		</div>

	<?php
	}
	else{
		echo '<meta http-equiv="refresh" content="0;URL=?page=category_management"/>';
	}
	?>

    <?php
	if (isset($_POST["btnUpdate"]))
	{
		$id = $_POST["txtID"];
		$name = $_POST["txtName"];
		$des = $_POST["txtDes"];
		$err = "";
		if($name=="")
		{
			$err .="<li>enter category Name. please</li>"; 
		}
		if ($err!="")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
			$sq="SELECT * From public.category where Cat_ID != '$id' and Cat_Name='$name'";
			$result = pg_query($conn,$sq);
			if (pg_num_rows($result)==0)
			{
				pg_query($conn, "UPDATE category SET Cat_Name = '$name', Cat_Des= '$des' where Cat_ID = '$id'");
				echo '<meta http-equiv="refresh" content="0;URL=?page=category_management"/>';
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










      