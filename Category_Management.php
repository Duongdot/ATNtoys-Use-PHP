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
    if (!isset($_SESSION['us']) or $_SESSION ['admin']==0)
    {
      echo "<script>alert('You are not adminstrator')</script>";
      echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    }
    else
    {
    ?>


      <form name="frm" method="post" action="">
        <h1>Product Category</h1>
        <p>
        	<img src="./tree/img/add.png" alt="Add_Product" width="16" height="16" border="0"/>
            <a href="?page=Add_category"> Add new </a> 
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Category Name</strong></th>
                     <th><strong>Description</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>
			<tbody>
            <?php
                include_once("conection.php");
                if (isset($_GET["function"]) == "del")
                {
                    if(isset($_GET["id"]))
                    {
                        $id = $_GET["id"];
                        pg_query($conn, "DELETE FROM category WHERE cat_id='$id'");
                    }
                }
                ?>

                <!-- end get data web-->

                <script language="javascript">
                    function deleteConfirm()
                    {
                        if (confirm("Are you sure delete"))
                            {
                                return true;
                            }
                        else{
                                 return false;
                            }
                    }
                </script>

                <!-- get data web-->
                <?php
                    $No=1;
                    $result= pg_query($conn,"SELECT * FROM public.category");
                    while ($row = pg_fetch_assoc($result))
                    {   
                ?>
			<tr>
              <td class="cotCheckBox"><?php echo $No; ?></td>
              <td><?php echo $row["cat_name"]; ?></td>
              <td><?php echo $row["cat_des"]; ?></td>
              <td style='text-align:center'><a href="?page=update_category&&id=<?php echo $row["cat_id"];?>"><img src='./tree/img/edit.png' border='0' width="30" height="30" /></td>
              <td style='text-align:center'><a href="?page=category_management&&function=del&&id=<?php echo $row["cat_id"];?>" onclick="return deleteConfirm()"><img src='./tree/img/delete.png' border='0' width="30" height="30"/></a></td>
            </tr>
            <?php
            $No++;
            }
            ?>
			</tbody>
        </table>  
        <div class="row" style="background-color:#FFF">	
            </div>
        </div>
        </form>
<?php
    }
?>
</body>
</html>






