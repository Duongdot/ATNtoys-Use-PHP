<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="./scripts/ckeditor/ckeditor.js"></script>
	<title>Dery</title>
</head>

<body>

	<?php
	include_once("conection.php");
	function blind_Category_List($conn)
	{
		$sqlstring = "SELECT cat_id, cat_name from public.category";
		$result = pg_query($conn, $sqlstring);
		echo "<select name='CategoryList' class='form-control'>
		<option value='0'>Choose category</option>";
		while ($row = pg_fetch_assoc($result)) {
			echo "<option value = '" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
		}
		echo "</select>";
	}
	function blind_Shops_List($conn)
	{
		$sqlstring = "SELECT shop_id, shop_name from public.shops";
		$result = pg_query($conn, $sqlstring);
		echo "<select name='ShopsList' class='form-control'>
		<option value='0'>Choose Shop</option>";
		while ($row = pg_fetch_assoc($result)) {
			echo "<option value = '" . $row['shop_id'] . "'>" . $row['shop_name'] . "</option>";
		}
		echo "</select>";
	}
	if (isset($_POST["btnAdd"])) {
		$id = $_POST["txtID"];
		$proname = $_POST["txtName"];
		$short = $_POST['txtShort'];
		$detail = $_POST['txtDetail'];
		$price = $_POST['txtPrice'];
		$qty = $_POST['txtQty'];
		$pic = $_FILES['txtImage'];
		$category = $_POST['CategoryList'];
		$shops = $_POST['ShopsList'];
		$oldprice = $_POST['txtOldPrice'];
		$err = "";
		if (trim($id) == "") {
			$err .= "<li>enter poduct ID, Please</li>";
		}
		if (trim($proname) == "") {
			$err .= "<li>enter Product Name, Please</li>";
		}
		if (trim($category) == "0") {
			$err .= "<li>Choose category, Please</li>";
		}
		if (!is_numeric($price) || ($price <= 0)) {
			$err .= "<li>enter price greater than 0 or is number, Please</li>";
		}


		if (!is_numeric($qty) || ($qty <= 0)) {
			$err .= "<li>enter Quantity, Please</li>";
		}
		if ($err != "") {
			echo "<ul>$err</ul>";
		} else {
			if ($pic['type'] == "image/jpg"  || $pic['type'] == "image/jpeg" || $pic['type'] == "image/png" || $pic['type'] == "image/gif") {
				if ($pic['size'] <= 614400) {
					$sq = "SELECT * from public.product where product_id='$id' or product_name='$proname'";
					$result = pg_query($conn, $sq);
					if (pg_num_rows($result) == 0) {
						copy($pic['tmp_name'], "./tree/img/" . $pic['name']);
						$_filePic = $pic['name'];
						$sqlstring = "INSERT INTO product (product_id, product_name, price, oldprice, smalldesc, detaildesc, prodate, pro_qty, pro_image, cat_id , shop_id) 
						VALUES ('$id','$proname','$price','$oldprice','$short','$detail','" . date('Y-m-d H:i:s') . "', $qty,'$_filePic', '$category','$shops')";
						pg_query($conn, $sqlstring);
						echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
					} else {
						echo "<li>duplicate product</li>";
					}
				} else {
					echo "<li>image big</li>";
				}
			} else {
				echo "<li>image fomat is not correct</li>";
			}
		}
	}
	?>
	<div class="container">
		<h2>Adding new Product</h2>
		<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="txtTen" class="col-sm-2 control-label">Product ID(*): </label>
				<div class="col-sm-10">
					<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value='' />
				</div>
			</div>
			<div class="form-group">
				<label for="txtTen" class="col-sm-2 control-label">Product Name(*): </label>
				<div class="col-sm-10">
					<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value='' />
				</div>
			</div>
			<!-- chose category -->
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Product category(*): </label>
				<div class="col-sm-10">
					<?php blind_Category_List($conn); ?>
				</div>
			</div>
			<!-- chose category -->
			<!-- chose shops -->
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Shops(*): </label>
				<div class="col-sm-10">
					<?php blind_Shops_List($conn); ?>
				</div>
			</div>
			<!-- chose shops -->
			<div class="form-group">
				<label for="lblGia" class="col-sm-2 control-label">Price(*): </label>
				<div class="col-sm-10">
					<input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='' />
				</div>
			</div>
			<div class="form-group">
				<label for="lblGia" class="col-sm-2 control-label">OldPrice(*): </label>
				<div class="col-sm-10">
					<input type="text" name="txtOldPrice" id="txtOldPrice" class="form-control" placeholder="Price" value='' />
				</div>
			</div>
			<div class="form-group">
				<label for="lblShort" class="col-sm-2 control-label">Short description(*): </label>
				<div class="col-sm-10">
					<input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value='' />
				</div>
			</div>

			<div class="form-group">
				<label for="lblDetail" class="col-sm-2 control-label">Detail description(*): </label>
				<div class="col-sm-10">
					<textarea name="txtDetail" rows="4" class="ckeditor"></textarea>
					<script language="javascript">
						CKEDITOR.replace('txtDetail', {
							skin: 'kama',
							extraPlugins: 'uicolor',
							uiColor: '#eeeeee',
							toolbar: [
								['Source', 'DocProps', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates'],
								['Cut', 'Copy', 'Paste', 'PasteText', 'PasteWord', '-', 'Print', 'SpellCheck'],
								['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
								['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
								['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Subscript', 'Superscript'],
								['OrderedList', 'UnorderedList', '-', 'Outdent', 'Indent', 'Blockquote'],
								['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull'],
								['Link', 'Unlink', 'Anchor', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
								['Image', 'Flash', 'Table', 'Rule', 'Smiley', 'SpecialChar'],
								['Style', 'FontFormat', 'FontName', 'FontSize'],
								['TextColor', 'BGColor'],
								['UIColor']
							]
						});
					</script>
				</div>
			</div>

			<div class="form-group">
				<label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*): </label>
				<div class="col-sm-10">
					<input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="" />
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
					<input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
					<input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Cancel" onclick="window.location='?page=product_management'" />
				</div>
			</div>
		</form>
	</div>
</body>
</html>