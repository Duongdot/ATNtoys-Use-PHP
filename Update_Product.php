<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="./tree/img/logo1.png">
  <script type="text/javascript" src="./scripts/ckeditor/ckeditor.js"></script>
  <title>ATN</title>
</head>

<body>
 
<?php
	include_once("conection.php");
	Function bind_Category_List($conn,$selectedValue){
		$sqlstring="SELECT cat_id, cat_name FROM public.category";
		$result = pg_query($conn, $sqlstring);
		echo "<select name='CategoryList' class='form-control'>
			<option value='0'>Chose category</option>";
			while ($row = pg_fetch_assoc($result)){
				if($row['cat_id'] == $selectedValue)
				{
					echo "<option value='".$row['cat_id']."' selected>".$row['cat_name']."</option>";
				}
				else{
					echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
				}
			}
		echo "</select>";
	}
	if(isset($_GET["id"]))
	{
		$id= $_GET["id"];
		$sqlstring = "SELECT product_name, price, smalldesc, detaildesc, prodate,
		pro_qty, pro_image, cat_id
		FROM public.product WHERE product_id = '$id' ";

		$result = pg_query($conn, $sqlstring);
		$row = pg_fetch_assoc($result);
		
		$proname =$row["product_name"];
		$short = $row['smalldesc'];
		$detail=$row['detaildesc'];
		$price=$row['price'];
		$qty=$row['pro_qty'];
		$pic =$row['pro_image'];
		$category= $row['cat_id'];

?>
<div class="container">
	<h2>Updating Product</h2>

	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" 
								  placeholder="Product ID" readonly value='<?php echo $id; ?>'/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" 
								  placeholder="Product Name" value='<?php echo $proname;?>'/>
							</div>
                </div>   
                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
							      <?php bind_Category_List($conn,$category); ?>
							</div>
                </div>  
                          
                <div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='<?php echo $price; ?>'/>
							</div>
                 </div>   
                            
                <div class="form-group">   
                    <label for="lblShort" class="col-sm-2 control-label">Short description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value='<?php echo $short;?>'/>
							</div>
                </div>
                            
                <div class="form-group">  
        	        <label for="lblDetail" class="col-sm-2 control-label">Detail description(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtDetail" rows="4" class="ckeditor"><?php echo $detail;?></textarea>
              					  <script language="javascript">
                                        CKEDITOR.replace( 'txtDetail',
                                        {
                                            skin : 'kama',
                                            extraPlugins : 'uicolor',
                                            uiColor: '#eeeeee',
                                            toolbar : [ ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
                                                ['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
                                                ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                                                ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
                                                ['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
                                                ['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
                                                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
                                                ['Link','Unlink','Anchor', 'NumberedList','BulletedList','-','Outdent','Indent'],
                                                ['Image','Flash','Table','Rule','Smiley','SpecialChar'],
                                                ['Style','FontFormat','FontName','FontSize'],
                                                ['TextColor','BGColor'],[ 'UIColor' ] ]
                                        });	
                                    </script> 
                                  
							</div>
                </div>
                            
            	<div class="form-group">  
                    <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="<?php echo $qty;?>"/>
							</div>
                </div>
 
				<div class="form-group">  
	                <label for="sphinhanh" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
							<img src='./tree/img/<?php echo $pic; ?>' border='0' width="50" height="50"  />
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
							</div>
                </div>
                        
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Cancel" onclick="window.location='?page=product_management'" />
                              	
						</div>
				</div>
			</form>
</div>
<?php
	}	
	else 
	{
		echo '<meta http-equiv="Refresh" content="0; URL=?page=product_management"/>';
	}
?>
<?php	
	include_once("conection.php");
	if(isset($_POST["btnUpdate"]))
	{
		$id=$_POST["txtID"];
		$proname=$_POST["txtName"];
		$short=$_POST['txtShort'];
		$detail=$_POST['txtDetail'];
		$price=$_POST['txtPrice'];
		$qty=$_POST['txtQty'];
		$pic=$_FILES['txtImage'];
		$category=$_POST['CategoryList'];
		$err="";

		if(trim($id)=="")
		{
			$err .="<li>Enter Product ID, please</li>";
		}
		if(trim($proname)=="")
		{
			$err .= "<li>Enter product name,please</li>";
		}
		if($category=="0")
		{
			$err .= "<li>Choose product category,please</li>";
		}
		if(!is_numeric($price))
		{
			$err .= "<li>Product price must be number</li>";
		}
		if(!is_numeric($qty))
		{
			$err .= "<li>Product quantity must be number</li>";
		}
		if($err != "")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
			if($pic['name'] !="")
			{
				if($pic['type']=="image/jpg" || $pic['type']=="image/jpeg" || $pic['type']=="image/png" || $pic['type']=="image/git" )
				{
					if($pic['size']<= 614400)
					{
						$sq="SELECT * FROM public.product WHERE product_id != '$id' and product_name='$proname'";
						$result=pg_query($conn,$sq);
						if(pg_num_rows($result)==0)
						{
						copy($pic['tmp_name'], "product-imgs/".$pic['name']);
						$filePic = $pic['name'];

						$sqlstring="UPDATE product SET product_name='$proname', price=$price, smalldesc='$short',
						detaildesc='$detail', pro_qty=$qty, pro_image='$filePic',cat_id='$category',
						prodate='".date('Y-m-d H:i:s')."' WHERE product_id='$id'";
						pg_query($conn,$sqlstring);
						echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
						}
						else 
						{
							echo "<li>Duplicate productId or Name</li>";
						}
					}
					else 
					{
						echo "Size of image to big";
					}	
				}
				else 
				{
					echo "Image format is not correct";
				}
			}
			else
			{
				$sq="SELECT * FROM public.product where product_id != '$id' and product_name='$proname'";
				$result= pg_query($conn,$sq);
				if(pg_num_rows($result)==0)
				{
					$sqlstring="UPDATE product SET product_name='$proname',
					price=$price,smalldesc='$short',detaildesc='$detail',pro_qty=$qty,
					cat_id='$category',prodate='".date('Y-m-d H:i:s')."' WHERE product_id='$id'";
					pg_query($conn,$sqlstring);
					echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
				}
				else 
				{	
					echo "<li>Duplicate productId or Name</li>";
				}
			}
		} 
	}
?>
	
</body>
</html>