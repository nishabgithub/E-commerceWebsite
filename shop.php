<?php

include('./admin/functions/userfunction.php');
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

    <section id="page-header">
       <h2>#Stayhome</h2>
       <p>Save more with coupons & up to 70% off!</p>
</section>

    <section id="product1" class="section-p1">
    <h2>Women's Collection</h2>
    <p>Summer Collection New Morden Design</p>
    <?php
      $categories = getAllActive("categories");

      if(mysqli_num_rows($categories) > 0)
      {
        foreach($categories as $item)
        {
          ?>

<div class="pro-container" style=" transition-timing-function: ease-in-out;" data-aos="zoom-out">
      <a href="products.php?category=<?= $item['slug']; ?>" class="link">
      <div class="pro">
        <img src="uploads/<?= $item['image']; ?>" alt="">
        <div class="des">
         <span><?= $item['name']; ?></span>
         <h5><?= $item['description']; ?></h5>
         <!-- <div class="star">
          <i class="fas fa-star"></i> 
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
         </div> -->
         
        </div>
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
    </section>

    <section id="newsletter" class="section-p1">
        <div class="newstext">
          <h4>Sign Up For Newsletters</h4>
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
    <script src="script.js"></script>

    <!---------------------------- aos animation script ------------------------------------>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>