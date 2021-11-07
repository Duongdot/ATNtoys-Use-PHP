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
    if (!isset($_SESSION['us']) or $_SESSION ['admin']==0)//==0
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
      $sq = "SELECT pro_image from public.product WHERE product_id='$id'";
      $res = pg_query($conn, $sq);
      $row = pg_fetch_assoc($res, PGSQL_ASSOC);
      $filePic = $row['pro_image'];
      unlink("./tree/img/".$filePic);
      pg_query($conn, "DELETE FROM public.product WHERE product_id='$id'");
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
        $result = pg_query($conn, "SELECT product_id, product_name, price, pro_qty, pro_image, cat_name FROM product a, category b
                WHERE a.cat_id = b.cat_id ORDER BY prodate DESC");
        while ($row = pg_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $No; ?></td>
            <td><?php echo $row["product_id"]; ?></td>
            <td><?php echo $row["product_name"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td><?php echo $row["pro_qty"]; ?></td>
            <td><?php echo $row["cat_name"]; ?></td>
            <td align='center' class='cotNutChucNang'>
              <img src='./tree/img/<?php echo $row['pro_image'] ?>' border='0' width="50" height="50" />
            </td>
            <td align='center' class='cotNutChucNang'><a href="?page=update_product&&id=<?php echo $row["product_id"]; ?>"><img src='./tree/img/edit.png' border='0' width="30" height="30" /></a></td>
            <td align='center' class='cotNutChucNang'><a href="?page=product_management&&function=del&&id=<?php echo $row["product_id"]; ?>" onclick="return deleteConfirm()"><img src='./tree/img/delete.png' border='0' width="30" height="30" /></a></td>
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