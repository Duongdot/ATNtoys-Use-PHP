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
			$address = $_POST["txtAddress"];
            $phone = $_POST["txtPhone"];
            $email = $_POST["txtEmail"];
            $pic = $_FILES['txtImage'];
			$err = "";
			if($id=="")
			{
				$err.="<li>enter Shop ID, please</li>";
			}
			if($name=="")
			{
				$err.="<li>enter Shop Name, please</li>";
			}
			if($err!=="")
			{
				echo "<ul>$err</ul>";
			}
		}
	?>

<div class="container">
	<h2>Adding Shop</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Shop ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Shop Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Shop Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Address" value='<?php echo isset($_POST["txtAddress"])?($_POST["txtAddress"]):"";?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Phone(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPhone" id="txtPhone" class="form-control" placeholder="Phone" value='<?php echo isset($_POST["txtPhone"])?($_POST["txtPhone"]):"";?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" value='<?php echo isset($_POST["txtPhone"])?($_POST["txtPhone"]):"";?>'>
							</div>
					</div>
                    <div class="form-group">
                        <label for="sphinhanh" class="col-sm-2 control-label">Image(*): </label>
                        <div class="col-sm-10">
                            <input type="file" name="txtImage" id="txtImage" class="form-control" value="" />
                        </div>
			        </div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add New"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Cancel" onclick="window.location='?page=shops_management'" />
                              	
						</div>
					</div>
				</form>
	</div>
</body>
</html>










  