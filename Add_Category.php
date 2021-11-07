<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="./tree/css/Style.css">
  
<!-- fontAwsomae-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
 

  <title>Dery</title>
</head>

<body>
	  <?php
		include_once("conection.php");
		if (isset($_POST["btnAdd"]))
		{
			$id = $_POST["txtID"];
			$name = $_POST["txtName"];
			$des = $_POST["txtDes"];
			$err = "";
			if($id=="")
			{
				$err.="<li>enter category ID, please</li>";
			}
			if($name=="")
			{
				$err.="<li>enter category Name, please</li>";
			}
			if($err!=="")
			{
				echo "<ul>$err</ul>";
			}
			else
			{
				$id = htmlspecialchars(pg_escape_string($conn,$id));
				$name = htmlspecialchars(pg_escape_string($conn,$name));
				$des = htmlspecialchars(pg_escape_string($conn,$des));
				$sq="SELECT * FROM public.category where cat_id = '$id' or cat_name = '$name'";
				$result = pg_query($conn,$sq);
			if (pg_num_rows($result)==0)
			{
				pg_query($conn, "INSERT INTO category(cat_id, cat_name, cat_des) VALUES ('$id','$name','$des')");
				echo '<meta http-equiv="refresh" content="0;URL=?page=category_management"/>';
			}
			else
			{
				echo "<li>duplicate category ID or Name</li>";
			}
			}
		}
	?>

<div class="container">
	<h2>Adding Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Category ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Category Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDes"])?($_POST["txtDes"]):"";?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add New"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Cancel" onclick="window.location='?page=category_management'" />
                              	
						</div>
					</div>
				</form>
	</div>
</body>
</html>










  