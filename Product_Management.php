<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	

  <title>Dery</title>
</head>

<body>
  
    <?php
    if (!isset($_SESSION['admin'])or $_SESSION['admin']==0)
    {
      echo "<script>alert('You are not adminstrator')</script>";
      echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    }
    else
    {
    ?>

 <!-- java notfication -->
  <script language="javascript">
    function deleteConfirm() {
      if (confirm("Are you sure delete")) {
        return true;
      } else {
        return false;
      }
    }
  </script>


  <?php
  include_once("conection.php");
  if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $sq = "SELECT Pro_image from public.product WHERE Product_ID='$id'";
      $res = pg_query($conn, $sq);
      $row = pg_fetch_array($res, pg_ASSOC);
      $filePic = $row['Pro_image'];
      unlink("./tree/img/".$filePic);
      pg_query($conn, "DELETE FROM product WHERE Product_ID='$id'");
    }
  }
  ?>

  <form name="frm" method="post" action="">
    <h1>Product Management</h1>
    <p>
      <img src="./tree/img/add.png" alt="" width="16" height="16" border="0" />
      <a href="?page=add_product"> Add new </a>
    </p>
    <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th><strong>No.</strong></th>
          <th><strong>Product ID</strong></th>
          <th><strong>Product Name</strong></th>
          <th><strong>Price</strong></th>
          <th><strong>Quantity</strong></th>
          <th><strong>Category ID</strong></th>
          <th><strong>Image</strong></th>
          <th><strong>Edit</strong></th>
          <th><strong>Delete</strong></th>
        </tr>
      </thead>

      <tbody>
        <?php
        include_once("conection.php");
        $No = 1;
        $result = pg_query($conn, "SELECT Product_ID, Product_Name, Price, Pro_qty, Pro_image, Cat_Name FROM product a, category b
                WHERE a.Cat_ID = b.Cat_ID ORDER BY ProDate DESC");
        while ($row = pg_fetch_array($result, pg_ASSOC)) {
        ?>
          <tr>
            <td><?php echo $No; ?></td>
            <td><?php echo $row["Product_ID"]; ?></td>
            <td><?php echo $row["Product_Name"]; ?></td>
            <td><?php echo $row["Price"]; ?></td>
            <td><?php echo $row["Pro_qty"]; ?></td>
            <td><?php echo $row["Cat_Name"]; ?></td>
            <td align='center' class='cotNutChucNang'>
              <img src='./tree/img/<?php echo $row['Pro_image'] ?>' border='0' width="50" height="50" />
            </td>
            <td align='center' class='cotNutChucNang'><a href="?page=update_product&&id=<?php echo $row["Product_ID"]; ?>"><img src='./tree/img/edit.png' border='0' width="30" height="30" /></a></td>
            <td align='center' class='cotNutChucNang'><a href="?page=product_management&&function=del&&id=<?php echo $row["Product_ID"]; ?>" onclick="return deleteConfirm()"><img src='./tree/img/delete.png' border='0' width="30" height="30" /></a></td>
          </tr>
        <?php
          $No++;
        }
        ?>
      </tbody>

    </table>

  </form>
<?php
    }
?>

  <!--footer-->


</body>

</html>