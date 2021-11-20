<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ATN</title>
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
      pg_query($conn, "DELETE FROM public.shops WHERE shop_id='$id'");
    }
  }
  ?>

  <form name="frm" method="post" action="">
    <h1>Shop Management</h1>
    <p>
      <img src="./tree/img/add.png" alt="" width="16" height="16" border="0" />
      <a href="?page=add_shop"> Add new </a>
    </p>
    <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th><strong>No.</strong></th>
          <th><strong>Shop ID</strong></th>
          <th><strong>Shop Name</strong></th>
          <th><strong>Address</strong></th>
          <th><strong>Phone</strong></th>
          <th><strong>Edit</strong></th>
          <th><strong>Delete</strong></th>
        </tr>
      </thead>

      <tbody>
        <?php
        include_once("conection.php");
        $No = 1;
        $result = pg_query($conn, "SELECT shop_id, shop_name ,address, phone,email FROM public.shops");
        while ($row = pg_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $No; ?></td>
            <td><?php echo $row["shop_id"]; ?></td>
            <td><?php echo $row["shop_name"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
            <td><?php echo $row["phone"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td align='center' class='cotNutChucNang'><a href="?page=update_shop&&id=<?php echo $row["shop_id"]; ?>"><img src='./tree/img/edit.png' border='0' width="30" height="30" /></a></td>
            <td align='center' class='cotNutChucNang'><a href="?page=shops_management&&function=del&&id=<?php echo $row["shop_id"]; ?>" onclick="return deleteConfirm()"><img src='./tree/img/delete.png' border='0' width="30" height="30" /></a></td>
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
