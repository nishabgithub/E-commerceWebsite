<?php

// session_start();
include('./admin/functions/userfunction.php');
include('./admin/functions/authcode.php');
// include('authenticate.php')
// include('foremail.php');
?>
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

    <section class="image-slideshow">
     
     <div class="imagehead fade">
     <div id="hero" >
      <div style=" backdrop-filter: blur(5px);">
       <h4>Trade-in-offer</h4>
       <h2>Super value deals</h2>
       <h1>On all products</h1>
       <p>Save more with coupons & up to 70% off!</p>
       <a href="shop.php"><button>Shop Now</button></a>
       </div>
       </div>
     </div>

      <div class="imagehead fade">
      <div id="hero1" >
       <div style=" backdrop-filter: blur(5px);">
       <h4  style="color:white;">Trade-in-offer</h4>
       <h2  style="color:white;">Super value deals</h2>
       <h1>On all products</h1>
       <p  style="color:white;">Save more with coupons & up to 70% off!</p>
       <a href="shop.php"><button>Shop Now</button></a>
       </div>
       </div>
      </div>

      <div class="imagehead fade">
      <div id="hero2" >
     <div style=" backdrop-filter: blur(5px);">
       <h4  style="color:white;">Trade-in-offer</h4>
       <h2  style="color:white;">Super value deals</h2>
       <h1>On all products</h1>
       <p style="color:white;">Save more with coupons & up to 70% off!</p>
       <a href="shop.php"><button>Shop Now</button></a>
       </div>
       </div>
      </div>
    </section>

    <section id="feature"> 
      <div class="fe-box">
      <img src="images/1.png" alt="" >
      <figcaption><h6>Free Shipping</h6></figcaption>
    </div>
    <div class="fe-box">
      <img src="images/2.png" alt="">
      <figcaption><h6>Online Order</h6></figcaption>
    </div>
    <div class="fe-box">
      <img src="images/3.png" alt="">
      <figcaption><h6>Save Money</h6></figcaption>
    </div>
    <div class="fe-box">
      <img src="images/4.png" alt="">
      <figcaption><h6>Sale</h6></figcaption>
    </div>
    <div class="fe-box">
      <img src="images/5.png" alt="">
      <figcaption><h6>24X7 Service</h6></figcaption>
    </div>
    </section>

    <section id="product1" class="section-p1">
    <h2>Our Collections</h2>
    <p>Summer Collection New Morden Design</p>
    <?php
          $trendingproducts = getAllTrending();
          if(mysqli_num_rows($trendingproducts) > 0)
          {
            foreach ($trendingproducts as $item)
            {
    ?> 
<div class="pro-container" id="reload" data-aos="zoom-in-up">
      <div class="pro">
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
        <img src="uploads/<?= $item['image']; ?>" alt="">
        <div class="des">
         <!-- <span><?= $item['name']; ?></span><br> -->
         <h5><?= $item['description']; ?></h5><br>

         <!-- <div class="star">
          <i class="fas fa-star"></i> 
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div> -->
         
         <h4><small>Rs.</small><?= $item['selling_price']; ?></h4>
        </div>
        </a>
    
      </div>
      
  </div>
  <?php
}
}
?>
    </section>
    

    <section id="banner" class="section-m1">
      <h4>Repair Services</h4>
      <h2>Up to <span>70% off</span> - All t-shirt & Accessories</h2>
      <a href="shop.php"><button class="normal">Explore Menu</button></a>
    </section>

    <section id="product1" class="section-p1">
      <h2>New Arrivals</h2>
      <p>Winter Collection New Morden Design</p>
      <?php
          $newproducts = getAllNewArrival();
          if(mysqli_num_rows($newproducts) > 0)
          {
            foreach ($newproducts as $item)
            {
    ?> 
     <div class="pro-container" id="reload" data-aos="zoom-in-up">
      <div class="pro">
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
        <button type="button" onclick="window.location.reload();" id="dltbtn" class="deletewishItem idx-dlt-btn reload" value="<?= $prodId; ?>"><i class="fa-solid fa-heart w"></i></button>
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
        <img src="uploads/<?= $item['image']; ?>" alt="">
        <div class="wish">
         <!-- <span><?= $item['name']; ?></span><br> -->
         <h5><?= $item['description']; ?></h5><br>

         <!-- <div class="star">
          <i class="fas fa-star"></i> 
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div> -->
         
         <h4><small>Rs.</small><?= $item['selling_price']; ?></h4>
        </div>
        </a>
    
      </div>
      
  </div>
  <?php
}
}
?>
      </section>

      <section id="sm-banner" class="section-p1">
        <div class="banner-box ">
          <h4>Crazy deals</h4>
          <h2>buy 1 get 1 free</h2>
          <span>The best classic dress is on sale at clara</span>
          <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box1">
          <h4>Spring/Summer</h4>
          <h2>Upcoming Season</h2>
          <span>The best classic dress is on sale at clara</span>
          <button class="white">Learn More</button>
        </div>
      </section>

      <section id="banner3">
        <div class="banner-box ">
           <h2>SEASONAL SALE</h2>
           <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
          <h2></h2>
          <h3></h3>
       </div>
       <div class="banner-box banner-box3">
        <h2>SEASONAL SALE</h2>
        <h3>Winter Collection -50% OFF</h3>
     </div>
      </section>

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

      <section>
      <?php include 'footer.php';?>
      </section>
      

      <script src="./admin/assests/js/custom.js"></script>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     
    <script src="script.js"></script>

    <!---------------------------- aos animation script ------------------------------------>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>