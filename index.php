<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- CSS-->
  <link rel="stylesheet" href="./tree/css/Style.css">

  <!-- fontAwsomae-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <!-- webicon -->
  <link rel="shortcut icon" href="./tree/img/logo1.png">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./tree/css/owl.carousel.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./tree/css/responsive.css">

  <!--datatable-->
  <script src="js/jquery-3.2.0.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>


  <title>ATN Shop</title>
</head>

<body>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  <?php
  session_start();
  include_once("conection.php");
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="./tree/img/logo1.png" alt="logo" class="logo">ATN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#footers">About us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Management
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="?page=category_management">Category</a></li>
              <li><a class="dropdown-item" href="?page=product_management">Product</a></li>
              <li><a class="dropdown-item" href="?page=shops_management">Shops</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Product
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#sessionproduct">Latest Products</a></li>
              <li><a class="dropdown-item" href="#sessionproduct">Best Sellers</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="?page=shop">See more</a></li>
            </ul>
          </li>
        </ul>
        <!-- <ul class="nav-item">
                <form class="navbar-form navbar-left" action="index.php?page=search" method="post">
                        <div class="form-group">
                      
                        </div>                        
                </form>
        </ul> -->
        
        <!-- <form class="d-flex">
          <ul class="nav navbar-nav navbar-right">
            <li><button><a href="?page=cart" style="font-size:24px">
                <i class="fa fa-shopping-cart"></i>Cart</a></button></li>
          </ul>
        </form> -->
        <form class="d-flex" action="index.php?page=search" method="post">
          <input class="form-control me-2" type="text" name="txtSearch" placeholder="Search" aria-label="Search">
          <button type="submit" class="btn btn-info">Search</button>
        </form>
       
        
        <form class="d-flex">
          <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION['us']) && $_SESSION['us'] != "") {
            ?>
              <li><a style="color:#000" href="?page=update_customer">
              <i class="fas fa-user-edit">Hi, <?php echo $_SESSION['us']?></i>
              </a>
              </li>
              <li><a href="?page=logout" style="color: #000;">
              <i class="fas fa-sign-out-alt">Logout</i>
              </a>
              </li>
            <?php
            } else {
            ?>
              <li><a href="?page=login" style="color:#000">
                  <i class="fa fa-lock"></i>Login</a></li>
              <li><a href="?page=register" style="color:#000">
                  <i class="fa fa-star"></i>Register</a></li>
            <?php
            }
            ?>
          </ul>
        </form>
      </div>
    </div>
  </nav>
</div>


  <!-- End Menu -->

  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == "register") {
      include_once("Register.php");
    } elseif ($page == "login") {
      include_once("Login.php");
    } elseif ($page == "category_management") {
      include_once("Category_Management.php");
    } elseif ($page == "product_management") {
      include_once("Product_Management.php");
    }elseif ($page == "shops_management") {
      include_once("Shops_Management.php"); 
    } elseif ($page == "Add_category") {
      include_once("Add_Category.php");
    } elseif ($page == "update_category") {
      include_once("Update_Category.php");
    } elseif ($page == "add_product") {
      include_once("Add_Product.php");
    } elseif ($page == "update_product") {
      include_once("Update_Product.php");
    } elseif ($page == "update_customer") {
      include_once("Update_customer.php");
    } elseif ($page == "logout") {
      include_once("logout.php");
    } elseif ($page == "shop") {
      include_once("Product.php");
    } elseif ($page == "cart") {
     include_once("cart.php");
    }elseif($page=="search")
    {
      include_once("search.php");
    }
    elseif($page=="shops_management")
    {
      include_once("Shops_Management.php");
    }
    elseif($page=="add_shop")
    {
      include_once("Add_Shops.php");
    }
    elseif($page=="update_shop")
    {
      include_once("Update_Shops.php");
    }
  } else {
    include_once("Content.php");
  }
  ?>



  <!--footer-->
  <footer id="footers">
    <section class="contact-section">
      <div class="row">
        <div class="col span-1-of-3">
          <ul class="information">
            <h2>Address</h2>
            <li><i class="fas fa-map-marker-alt"></i>Address: 21, Nguyen Trung Truc street, Ninh Kieu District, Can Tho City</li>
            <li><i class="fas fa-envelope"></i>Email: duonghqgcc19037@fpt.edu.vn</li>
            <li><i class="fas fa-phone"></i>Phone: (+84)333119697</li>
          </ul>
          <ul class="social-icons">
            <li><a href="https://www.facebook.com/duongquoccute"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://www.facebook.com/duongquoccute"><i class="fab fa-twitter-square"></i></a></li>
            <li><a href="https://www.facebook.com/duongquoccute"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://www.facebook.com/duongquoccute"><i class="fab fa-google-plus-square"></i></a></li>
          </ul>
        </div>
        <div class="col span-1-of-3">
          <div class="social-icons">
            <div class="information">
              <h2>About Us</h2>
              <p>Dery is a stationery store that supports and sells stationery, consumer electronics, and services.
              </p>
            </div>
          </div>
        </div>
        <div class="col span-1-of-3">
          <div class="menu">
            <div class="information">
              <h2>Menu</h2>
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Product</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <p class="copyright">
      Copyright &copy; 2021 by Dery Team
    </p>
  </footer>


  <!-- Latest jQuery form server -->
  <script src="https://code.jquery.com/jquery.min.js"></script>

  <!-- Bootstrap JS form CDN -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <!-- jQuery sticky menu -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  <!-- jQuery easing -->
  <script src="js/jquery.easing.1.3.min.js"></script>

  <!-- Main Script -->
  <script src="js/main.js"></script>

  <!-- Slider -->
  <script type="text/javascript" src="js/bxslider.min.js"></script>
  <script type="text/javascript" src="js/script.slider.js"></script>

  <!--data table - dat dung vi tri nay-->
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css"></script>
  <script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>

 
</body>

</html>