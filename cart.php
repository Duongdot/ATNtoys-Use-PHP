<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="csscart.css">
  <title>Basket</title>
</head>
<!-- </head>

<body>
  <main>
    <div class="basket">
      <div class="basket-module">
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta">Apply</button>
      </div>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="./tree/img/keo kho.jpg" alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <h1><strong><span class="item-quantity">4</span> x Eliza J</strong> Lace Sleeve Cuff Dress</h1>
            <p><strong>Navy</strong></p>
            <p>Product Code - 232321939</p>
          </div>
        </div>
        <div class="price">26.00</div>
        <div class="quantity">
          <input type="number" value="4" min="1" class="quantity-field">
        </div>
        <div class="subtotal">104.00</div>
        <div class="remove">
          <button>Remove</button>
        </div>
      </div>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="./tree/img/keyboard.jpg" alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <h1><strong><span class="item-quantity">1</span> x Whistles</strong> Amella Lace Midi Dress</h1>
            <p><strong>Navy</strong></p>
            <p>Product Code - 232321939</p>
          </div>
        </div>
        <div class="price">26.00</div>
        <div class="quantity">
          <input type="number" value="1" min="1" class="quantity-field">
        </div>
        <div class="subtotal">26.00</div>
        <div class="remove">
          <button>Remove</button>
        </div>
      </div>
    </div>
    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
          <select name="delivery-collection" class="summary-delivery-selection">
              <option value="0" selected="selected">Select Collection or Delivery</option>
             <option value="collection">Collection</option>
             <option value="first-class">Royal Mail 1st Class</option>
             <option value="second-class">Royal Mail 2nd Class</option>
             <option value="signed-for">Royal Mail Special Delivery</option>
          </select>
        </div>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total">130.00</div>
        </div>
        <div class="summary-checkout">
          <button class="checkout-cta">Go to Secure Checkout</button>
        </div>
      </div>
    </aside>
  </main>
</body>
</html> -->
<body>
<!-- <div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>4</b>
        </span>
      </h4>
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
    </div>
  </div>
</div> -->
<!-- <?php
    include_once("connection.php"); 
    if(!isset($_SESSION['us']))
    {
        echo "<script>alert('You must be login to see your cart')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
    else
    {
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
    //session_start();
    $cart = (isset($_SESSION['cart']))? $_SESSION['cart']: [];
?>

<script language="JavaScript">
function deleteConfirm() {
    if (confirm("Are you sure to delete!")) {
        return true;
    } else {
        return false;
    }
}
</script>
<H1><B>MY CART</B></H1>
<?php
    if($cart!=[])
    {
    ?>
<table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><strong>No.</strong></th>
            <th><strong>Product Name</strong></th>
            <th><strong>Image</strong></th>
            <th><strong>Quantity</strong></th>
            <th><strong>Price</strong></th>
            <th><strong>Unit Price</strong></th>
            <th><strong>Delete</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $total= 0;?>
        <?php foreach($cart as $key => $value){ 
                $total += ($value['price'] * $value['quantity']);
                ?>
        <tr>
            <td><?php echo $key++ ?></td>
            <td><?php echo $value['name']?></td>
            <td align='center' class='cotNutChucNang'>
                <img src='product-imgs/<?php echo $value['image'] ?>' border='0' width="100" height="100" />
            </td>
            <form method="GET" action="cartfuntion.php">
                <td>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="ma" value="<?php echo $value['id'] ?>">
                    <input type="number" size="4" name="quantity" value="<?php echo $value['quantity']?>">
                    <button type="submit" name="buttonupdate" id="buttonupdate">Update Quantity</button>
                </td>
            </form>
            <td>$<?php echo $value['price']?></td>
            <td>$<?php echo $value['price']*$value['quantity']?>
            </td>
            <td align='center' class='cotNutChucNang'>
                <a href="cartfuntion.php?ma=<?php echo $value['id'] ?>&action=delete" onclick="return deleteConfirm()">
                    <img src='images/delete.png' border='0' /></a>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="5" align="right">
                <h3>TOTAL:</h3>
            </td>
            <td>
                <h3 class="price"><b>$<?php echo Number_format($total);?></b></h3>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>
<div class="container">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-8">
        <form method="POST" action="?page=payment">
            <button type="submit" name="btnOrder" class="btn btn-primary">ORDER PRODUCT</button>
        </form>
        <br>
    </div>
</div>

<?php }
    else {
        echo "<script>alert('EMPTY CART! PLEASE ADD A PRODUCT TO CART!')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
    ?>
<?php
    }
    include_once("Allproduct.php");
 ?> -->
</body>