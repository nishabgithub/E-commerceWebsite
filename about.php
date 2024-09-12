<?php
session_start();
include('./admin/functions/authcode.php');
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
</head>
<body style="background-color: #f8f8fc;">
<section>
     <?php include 'nav.php';?>
    </section>

    <section class="about-header">
       <h2></h2>
       <p></p>
</section>

<section id="about-head" class="section-p1">
  <img src="images/about -sec -2.jpg" alt="">
   <div>
    <h2>Who We Are?</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique voluptatem quidem, nobis voluptatum consequatur doloremque odit harum quam molestias dolore.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident facilis voluptas consequuntur cumque voluptates similique aliquam iste ratione suscipit tempore!
    </p>
    <marquee backgroundcolor="#ccc" loop="-1" scrollamount="5" width="100%">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, quam! Tempora sapiente eos ratione reiciendis doloremque architecto adipisci ea pariatur quaerat, a iure, maiores ducimus officiis labore molestias veritatis laborum!
    </marquee>
   </div>
</section>

<section id="about-app" class="section-p1">
    <h2>Download Our <a href="">App</a></h2>
     <div class="video">
        <video autoplay muted loop src="images/Mobile App Presentation _ Video Template.mp4"></video>
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
</body>
</html>