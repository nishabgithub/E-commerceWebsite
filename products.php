<?php
// session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "phpecom";

// Creating database connection
$con = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if(isset($_POST['submit'])) {
    // Sanitize input
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Insert into the database
    $query = "INSERT INTO emails (email) VALUES ('$email')";
    if(mysqli_query($con, $query)) {
      $_SESSION['message'] = "subscribed successfully";
      header('Location: ');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Close the connection
// mysqli_close($con);
?>
<?php

include('./admin/functions/userfunction.php');


if(isset($_GET['category']))
{
 $category_slug = $_GET['category'];
 $category_data = getslugActive("categories",$category_slug);
 $category = mysqli_fetch_array($category_data);

 if($category)
 {
 $cid = $category['id'];
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<body style="background-color: #f8f8fc;"> 
     <section>
     <?php include 'nav.php';?>
</section>

    <!-- <section id="page-header">
       <h2>#Stayhome</h2>
       <p>Save more with coupons & up to 70% off!</p>
</section> -->

    <section id="product1" class="section-p3">
    <h2>Women's Collection / <?= $category['name']; ?></h2>
    <p>Summer Collection New Morden Design</p>
    <!-- <p>Summer Collection New Morden Design</p> -->
    <?php
      $products = getProdByCategory($cid);

      if(mysqli_num_rows($products) > 0)
      {
        foreach($products as $item)
        {
          ?>

  <div class="pro-container" data-aos="zoom-in-up">
      
      <div class="pro" id="reload">
      <?php
      if(isset($_SESSION['auth']))
      {
    $userId = $_SESSION['auth_user']['user_id'];
    $prodId = $item['id']; // Assuming $item['id'] represents the product id

    // Check if the product is in the user's wishlist
    $query = "SELECT c.id as cid, c.prod_id, p.id as pid
              FROM wishlist c
              INNER JOIN products p ON c.prod_id = p.id
              WHERE c.prod_id = '$prodId' AND c.user_id = '$userId'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0) {
        // Product is in wishlist, display delete button
?>
        <button type="button" id="dltbtn" onclick="window.location.reload();" class="deletewishItem idx-dlt-btn reload" value="<?= $prodId; ?>"><i class="fa-solid fa-heart w"></i></button>
<?php
    } else {
        // Product is not in wishlist, display add button    
?>
        <button type="button" id="addbtn" onclick="window.location.reload();" class="addtowishlist reload" value="<?= $prodId; ?>"><i class="fa-regular fa-heart ww"></i></button>
<?php
    }}
    else{
      ?>
      <a href="login.php" ><i class="fa-regular fa-heart ww"></i></a>
     <?php
    }
?>
 
      <a href="details.php?product=<?= $item['slug']; ?>" class="link">
        <img src="uploads/<?= $item['image']; ?>" alt="product img">
        <div class="des">
        <!-- <span><?= $item['id']; ?></span> -->
         <!-- <span><?= $item['name']; ?></span> -->
         <h5><?= $item['description']; ?></h5>
         <div class="star">
          <i class="fas fa-star"></i> 
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div>
         <h4><small><i class="fa-solid fa-indian-rupee-sign"></i></small><?= $item['selling_price']; ?></h4>
        </div>
        <!-- <a href="#"><i class="fa-solid fa-cart-shopping"></i></a> -->
      </div>
      </a>
  </div>

          <?php
        }
      }
      else{
        echo "no data available";
      }
    ?>
      <?php
      }
      else
       {
        "something went wrong";
       }
   }
       else
       {
        "something went wrong";
       }?>
       <section id="newsletter" class="section-p1">
       <div class="newstext">
         <h4>Subscribe Us For Newsletters</h4>
         <p>Got E-mail updates about our latest shop and <span> special offers.</span></p>
       </div>
       <div class="form">
         <form action="" method="post" class="form">
         <input type="email" class="email" name="email" id="email" placeholder="Your email address" required>
         <button class="normal" onclick="window.location.reload();" type="submit" id="submit" name="submit" value="Subscribe">Subscribe</button>
         </form>
       </div>
     </section>
      <?php
      include 'footer.php';?>
      </section>
   
    <script src="./admin/assests/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
         jQuery('#product1').on('button', function(e) {
             // jQuery('#message').html('');
             jQuery('.reload').html('Please wait');
             jQuery('.reload').attr('disabled', true);
             jQuery.ajax({
               url: 'products.php',
               type: 'post',
               data: jQuery('#product1').serialize(),
               success: function(result) {
                 // jQuery('#message').html(result);
                 jQuery('.reload').html('Submit');
                 jQuery('.reload').attr('disabled', false);
                 jQuery('#product1')[0].reset();
               }
             });
             e.preventDefault();
           });
     </script>

<!---------------------------- aos animation script ------------------------------------>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
 
  </body>
</html>