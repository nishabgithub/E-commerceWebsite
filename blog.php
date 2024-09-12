
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
session_start();
include('./admin/functions/authcode.php');
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

    <section class="blog-header">
       <h2>#Readmore</h2>
       <p>Save more with coupons & up to 70% off!</p>
</section>

<section id="blog">
 <div class="blog-box">
    <div class="blog-img">
        <img src="images/blog1.jpg" alt="">
    </div>
    <div class="blog-details">
        <h4>For Trendy clothes and Accessories</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione blanditiis, tempora quo consectetur, magni aspernatur aut minus odit sapiente, vel placeat ea dolorem veniam. Culpa et dolorem eveniet commodi maiores.</p>   
        <!-- <a href="">Continue Reading</a> -->
    </div>
    <h1>13/01</h1>
 </div>

 <div class="blog-box">
    <div class="blog-img">
        <img src="images/blog2.jpg" alt="">
    </div>
    <div class="blog-details">
        <h4>3d Printed Hoodies for Boys</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione blanditiis, tempora quo consectetur, magni aspernatur aut minus odit sapiente, vel placeat ea dolorem veniam. Culpa et dolorem eveniet commodi maiores.</p>   
        <!-- <a href="">Continue Reading</a> -->
    </div>
    <h1>01/01</h1>
 </div>

 <div class="blog-box">
    <div class="blog-img">
        <img src="images/blog4.jpg" alt="">
    </div>
    <div class="blog-details">
        <h4>We have good material and fabrics</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione blanditiis, tempora quo consectetur, magni aspernatur aut minus odit sapiente, vel placeat ea dolorem veniam. Culpa et dolorem eveniet commodi maiores.</p>   
        <!-- <a href="">Continue Reading</a> -->
    </div>
    <h1>23/04</h1>
 </div>

 <div class="blog-box">
    <div class="blog-img">
        <img src="images/blog3.jpg" alt="">
    </div>
    <div class="blog-details">
        <h4>The Classic Royal Shoes</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione blanditiis, tempora quo consectetur, magni aspernatur aut minus odit sapiente, vel placeat ea dolorem veniam. Culpa et dolorem eveniet commodi maiores.</p>   
        <!-- <a href="">Continue Reading</a> -->
    </div>
    <h1>16/02</h1>
 </div>

 <div class="blog-box">
    <div class="blog-img">
        <img src="images/blog5.jpg" alt="">
    </div>
    <div class="blog-details">
        <h4>Girls Trendy Hoodies</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione blanditiis, tempora quo consectetur, magni aspernatur aut minus odit sapiente, vel placeat ea dolorem veniam. Culpa et dolorem eveniet commodi maiores.</p>   
        <!-- <a href="">Continue Reading</a> -->
    </div>
    <h1>14/01</h1>
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