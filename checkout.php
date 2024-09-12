<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

  <?php

  include('./admin/functions/userfunction.php');
  include('./admin/functions/authcode.php');
  include('authenticate.php');
  include('admin/config/dbcon.php');
  // include('./admin/functions/placeorder.php');
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
  <div class="main-container">
     <div class="container-1">
     <section id="form" class="checkout-sec">
     <?php 
      if(isset($_SESSION['auth'])){
        $userId = $_SESSION['auth_user']['user_id'];
        $query = "SELECT * FROM address WHERE user_id='$userId' ORDER BY id DESC LIMIT 1  ";
        // Execute the SQL query
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) { // Check if query was successful and if there are rows returned
            // Fetch and display address details
            while($row = mysqli_fetch_assoc($result)){
        ?>
     <div class="add-address-btn-div">
     <form action="">
      <h3> Delivery Address</h3>
      <div class="radio-btn-div">
      <input type="radio" onclick="addressform()" id="icon2" name="fav_language" value="HTML" class="radio2" style="width:10%;">
       <label for="html" class="radio">Add New Address</label><br>
       <input type="radio" onclick="divform()" id="icon4" name="fav_language" value="CSS" class="radio2" style="width:10%;" checked="checked">
     <label for="css" class="radio">Your Address</label>
     </div>
       </form>
     </div>

           <div class="check-cont-list-inner-div-2" >
           <div id="popup2" class="popup-2">
               <div class="popup-form">
               <form action="admin/functions/edit-address.php" method="POST" id="frmContactus" >
                <h4 style="padding-top:10px; padding-bottom:10px;">Address Details</h4>
                <label for="name">Full name (First and Last name)</label>
                <input type="text" name="name" id="name" required>
                <label for="name">Email</label>
                <input type="email" name="email" id="email" required>
                <label for="number">Mobile Number</label>
                <input type="tel" name="number" id="number" onkeyup="numberonly(this)" required maxlength="10">
                <h6>may be used to assist delivery</h6><br>
                <label for="place">Flat, House no, Building, Company, Apartment</label>
                <textarea name="place" id="place" placeholder="Address" required></textarea>
                <label for="area">Area, Street, Sector, Village</label>
                <input type="text" name="area" id="area" placeholder="" required>
                <label for="landmark">Landmark</label>
                <input type ="text" name="landmark" id="landmark" placeholder="e.g near apollo hospital" required>
                <label for="pincode">Pincode</label>
                <input type="tel" name="pincode" id="pincode" onkeyup="numberonly(this)" placeholder="Pincode" maxlength="6" minlength="6" required>
                <label for="city">Town/City</label>
                <input type="text" name="city" id="city" placeholder="" required>
                <label for="state">State</label>
                <select name="state" id="state" required style="height:30px">
                    <option value="">State</option>
                    <option value="Uttrakhand">Uttrakhand</option>
                    <!-- Other options -->
                </select> <br>
                <p>By continuing, you agree to Clara's <span>Conditions of Use</span> and <span>Privacy Notice</span>.</p>
                <!-- <input type="hidden" name="payment_mode" value="COD"> -->
                <button type="submit" class="save" name="add-address">Save Address</button>
            </form>
            </div>
            </div>

           <div id="popup4">
            <form action="" method="POST" id="frmContactus">
                <h4 style="padding-top:10px; padding-bottom:10px;">Address Details</h4>
                <input type="hidden" id="order_id"  value="<?php echo $row['id'] ?>">
    
          <!-- <div class="add-cont-list-inner-div-3"> -->
            <ul type="none">
               <li>Name:&nbsp;<?php echo $row["name"]; ?></li>
                <br>
                <li>Email:&nbsp;<?php echo $row['email']; ?></li>
               <li>Area:&nbsp;<?php echo $row['area']; ?></li>
               <li>Place:&nbsp;<?php echo $row['place']; ?></li>
               <li>City:&nbsp;<?php echo $row['city']; ?></li>
               <li>Pincode:&nbsp;<?php echo $row['pincode']; ?></li>
               <li>Landmark:&nbsp;<?php echo $row['landmark']; ?></li>
               <li>State:&nbsp;<?php echo $row['state']; ?></li>
              <br>
           <li>Number:&nbsp;<?php echo $row['number']; ?></li>
         </ul>
      <!-- </div> -->
    </div>
        
            <br>
          
           </div>
</section>

  </div>
  <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <div class="container-2">
    <div class="cont-2-inner-1">
    <section id="cart-2" class="section-p4" >
      <table width="100%" >
        <thead>
            <tr>
                <td>Image</td>
                <td>Product</td>
                <td>Quantity</td>
                <td>Subtotal</td>
            </tr>
        </thead>
        <tbody>

          <?php $items = getCartItems();
          $subtotal = 0;
          $cart_total = 0;

          foreach($items as $citem){
           
            ?>
            <?php
                 $subtotal = $citem['selling_price'] * $citem['prod_qty'];
                 $cart_total += $citem['selling_price'] * $citem['prod_qty'];
            ?>
          
               <tr id="product_data">
                  <td><img src="uploads/<?= $citem['image'] ?>" alt="" ></td>          
                  <td><?= $citem['name'] ?></td>
                  <td>
                   <div class="qty-div qty">
                     <input type="hidden" class="prodId" id="prod_id" name="prod_id" value="<?= $citem['prod_id'] ?>">
                     <input type="text" name="prod_qty" id="qty" class="input-qty " value="<?= $citem['prod_qty'] ?>" disabled>
                     <input type="hidden" name="size" id="size" class="size" value="<?= $citem['size'] ?>">
                     <input type="hidden" name="cart_total" id="cart_total" value="<?= $citem['selling_price']?>">
                   </div>
                  </td>
                 <td id="">Rs.<?= $subtotal?></td>
                 
                </tr>
           <?php
            // echo $citem['name'];
           }
            ?>
        </tbody>
      </table>
      <hr>
    </section>
    <div class="total-main">
        <div> 
        Total Price:
        </div>
        <div id="amount" class="amount ">
        <?= $cart_total?>
        </div>
    </div>
    </div>
    <div >
      <!-- <button type="button" class="placeOrderBtn" >Place Order</button> -->
      <input type="button" name="btn" class="pay-btn" value="Pay Now" onclick="pay_now()" id="rzp-button1">

</form>

    </div>
    </div>
    </div>
    <?php
            }
        } else {
            // Display form for new address
    ?>
           <div class="">
           <form action="admin/functions/edit-address.php" method="POST" id="frmContactus">
                <h2>Address Details</h2>
                <label for="name">Full name (First and Last name)</label>
                <input type="text" name="name" id="name" required>
                <label for="name">Email</label>
                <input type="email" name="email" id="email" required>
                <label for="number">Mobile Number</label>
                <input type="tel" name="number" id="number" onkeyup="numberonly(this)" required maxlength="10">
                <h6>may be used to assist delivery</h6><br>
                <label for="place">Flat, House no, Building, Company, Apartment</label>
                <textarea name="place" id="place" placeholder="Address" required></textarea>
                <label for="area">Area, Street, Sector, Village</label>
                <input type="text" name="area" id="area" placeholder="" required>
                <label for="landmark">Landmark</label>
                <input type ="text" name="landmark" id="landmark" placeholder="e.g near apollo hospital" required>
                <label for="pincode">Pincode</label>
                <input type="tel" name="pincode" id="pincode" onkeyup="numberonly(this)" placeholder="Pincode" maxlength="6" minlength="6" required>
                <label for="city">Town/City</label>
                <input type="text" name="city" id="city" placeholder="" required>
                <label for="state">State</label>
                <select name="state" id="state" required style="height:30px">
                    <option value="">State</option>
                    <option value="Uttrakhand">Uttrakhand</option>
                    <!-- Other options -->
                </select> <br>
                <p>By continuing, you agree to Clara's <span>Conditions of Use</span> and <span>Privacy Notice</span>.</p>
                <input type="hidden" name="payment_mode" value="COD">
                <button type="submit" name="add-address">Save Address</button>
            </form>
           </div>
           
    <?php
        }
    }
    ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
                            function pay_now() {
                                // alert("working");
                                // var id = jQuery('#id').val();
                                var amount = jQuery('#amount').html();
                               var order_id = jQuery('#order_id').val();
                                // var prod_id= jQuery('#prod_id').val();
                                // var qty = jQuery('#qty').val();
                               // var cart_total = jQuery('#cart_total').val();
                                //var size = jQuery('#size').val();
                                // alert(cart_total);
                                // var size = jQuery('#size').val();
                                // var payment_id = jQuery('#payment_id').val();
                                        var options = {
                                            "key": "rzp_test_EJk4TWdqYcZpEb",
                                            "amount":  amount*100,
                                            "currency": "INR",
                                            // "name": "Aashiyana",
                                            "description": "Test Transaction",
                                            "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                                            "handler": function (response) {
                                              //  console.log(response.razorpay_payment_id);
                                              alert(goingtoplaceorderpage);
                                                jQuery.ajax({
                                                    method: "POST",
                                                    url: "admin/functions/placeorder.php",
                                                    data: 
                                                       {   
                                                        order_id: order_id,                
                                                        payment_id : response.razorpay_payment_id,
                                                        order_status:"Ordered",
                                                        },

                                                    success: function (result) {
                                                       window.location.href = "my-order.php";
                                                    },
                                                });
                                            },
                                        }
                                        var rzp1 = new Razorpay(options);
                                        rzp1.open();
                                    // }
                                // });


                            }
                        </script>

  
      <script src="./script.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      
</body>
</html>