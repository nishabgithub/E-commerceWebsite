  
  <?php
  include('./admin/functions/userfunction.php');
  include('./admin/functions/authcode.php');
  include('authenticate.php')
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      Clara Couture
    </title> 
    <link href="images/loogo.png" rel="icon" height:>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body style="background-color: #f8f8fc;">
<section>
     <?php include 'nav.php';?>
</section>


<?php
$items = getCartItems();
$subtotal = 0;
$cart_total = 0;
?>

<section class="cart-page">
    <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
</section>

<section id="cart" class="section-p5">
    <table width="100%">
        <thead>
            <tr>
                <td>Remove</td>
                <td>Image</td>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Subtotal</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($items) > 0) {
                foreach($items as $citem) {    
                    $subtotal = $citem['selling_price'] * $citem['prod_qty'];
                    $cart_total += $citem['selling_price'] * $citem['prod_qty'];
            ?>
            <tr id="product_data">
                <td><button class="deleteItem remove" onclick="window.location.reload();" value="<?= $citem['cid'] ?>"><i class="fa fa-trash"></i>&nbsp;Remove</button></td>
                <td><a href="details.php?product=<?= $citem['slug']; ?>" ><img src="uploads/<?= $citem['image'] ?>" alt=""></a></td>
                <td><?= $citem['name'] ?></td>
                <td>Rs.<?= $citem['selling_price'] ?></td>
                <td>
                    <div class="qty-div">
                        <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                        <button type="button" onclick="window.location.reload();" class="qty-btn quantity-left-minus updateQty">-</button>
                        <input type="text" name="quantity" class="input-qty" value="<?= $citem['prod_qty'] ?>" disabled>
                        <button type="button" onclick="window.location.reload();" class="qty-btn quantity-right-plus updateQty">+</button>
                    </div>
                </td>
                <td>Rs.<?= $subtotal ?></td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6'>Your Cart is Empty</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>
<?php
            if(mysqli_num_rows($items) > 0) {
                
            ?>
<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Apply Coupon</h3>
        <div>
            <input type="text" placeholder="Enter Your Coupon">
            <button class="normal">Apply</button>
        </div>
    </div>
    <div id="subtotal">
        <h3>Cart Totals</h3>
        <table>
            <tr>
                <td>Cart Subtotal</td>
                <td>Rs.<?= $cart_total ?></td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>Rs.<?= $cart_total ?></strong></td>
            </tr>
        </table>
        <a href="checkout.php"><button class="normal">Proceed to checkout</button></a>
    </div>
</section>
<?php
                }
            
            ?>

    
<section>
      <?php include 'footer.php';?>
      </section>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>
</html>