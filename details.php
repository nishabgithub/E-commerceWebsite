
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
include('./admin/functions/userfunction.php');

// include('./login.php');


if(isset($_GET['product']))
{
$product_slug = $_GET['product'];
$product_data = getslugActive("products",$product_slug);
$product = mysqli_fetch_array($product_data);

if($product)
{
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
<body  style="background-color: #f8f8fc;">
    <section>
     <?php include ('nav.php');?>
    </section>


<section id="prodetails" class="section-p1 padding ">
    <div class="single-pro-image ">
        <img src="uploads/<?= $product['image']; ?>" alt="" width="100%" id="main-img">
        <!-- <div class="small-img-group">
            <div class="small-img-col">
                <img src="images/winter.jpg" alt="" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
                <img src="images/winter.jpg" alt="" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
                <img src="images/winter.jpg" alt="" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
                <img src="images/winter.jpg" alt="" width="100%" class="small-img">
            </div>
        </div> -->
    </div>
     
    <div class="single-pro-details">
      <h2><?= $product['name']; ?></h2>
      <span class="trend"><?php if($product['trending']){echo "Trending";} ?></span>
      <h4><?= $product['description']; ?></h4>
      <span><small><i class="fa-solid fa-indian-rupee-sign"></i></small><s style="color:red;"><?= $product['original_price']; ?></s></span>
      <span><small><i class="fa-solid fa-indian-rupee-sign"></i></small><?= $product['selling_price']; ?></span>
    
      <div id="product_data">
       <form action="./admin/functions/handlecart.php" method="post">
              <select name="size" id="size" class="size" required>
                <!-- <option value="">Select Size</option> -->
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
              </select> 
       
       
                <div class="qty-div">
                  <button type="button" class="qty-btn quantity-left-minus disabled" id="">-</button>
                  <input type="text" name="quantity" class="input-qty" min="1" value="1" disabled>
                  <button type="button" class="qty-btn quantity-right-plus" id="plusBtn">+</button>
                </div>
                
        <!-- C A R T   B U T T O N S -->

        <?php
        if(isset($_SESSION['auth']))
        {
    $userId = $_SESSION['auth_user']['user_id'];
    $prodId = $product['id']; // Assuming $item['id'] represents the product id

    // Check if the product is in the user's wishlist
    $query = "SELECT c.id as cid, c.prod_id, p.id as pid
              FROM carts c
              INNER JOIN products p ON c.prod_id = p.id
              WHERE c.prod_id = '$prodId' AND c.user_id = '$userId'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0) {
        // Product is in wishlist, display delete button
?>
        <button type="button" id="normal" onclick="window.location.reload();" class="deleteItem" value="<?= $product['id']; ?>" ></i>Added To Cart</button>
        <?php
      }else{
        ?>
       <button type="button" id="normal" onclick="window.location.reload();" class="addtocartbtn" value="<?= $product['id']; ?>" ></i>Add To Cart</button> 
        <?php
      }}
      else{
        ?>
        <a href="login.php" ><button  type="button" id="normal" class="addtocartbtn" ></i>Add To Cart</button></a>
       <?php
      }
     ?>

      <!-- W I S H L T S T   B U T T O N S -->
       
      <?php
       if(isset($_SESSION['auth']))
       {
        $userId = $_SESSION['auth_user']['user_id'];
        $prodId = $product['id']; // Assuming $item['id'] represents the product id

    // Check if the product is in the user's wishlist
    $query = "SELECT c.id as cid, c.prod_id, p.id as pid
              FROM wishlist c
              INNER JOIN products p ON c.prod_id = p.id
              WHERE c.prod_id = '$prodId' AND c.user_id = '$userId'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0) {
        // Product is in wishlist, display delete button
?>
        <button type="button" id="wish" onclick="window.location.reload();" class="deletewishItem idx-dlt-btn" value="<?= $product['id']; ?>" ></i>Wishlisted</button>
        <?php
      }else{
        ?>
        <button type="button" id="wish" onclick="window.location.reload();" class="addtowishlist"value="<?= $product['id']; ?>" ></i>Wishlist</button> 
        <?php
      }}
      else{
        ?>
        <a href="login.php" ><button type="button" id="wish"  class="addtowishlist" >Wishlist</button> </a>
       <?php
      }
     ?>                                                                 
       
       
       
       
       
       
        <!-- <button  type="button" id="wish" class="addtowishlist" value="<?= $product['id']; ?>" ></i>Wishlist</button>  -->
        

        </form> 
      </div> 

       <h4>Product Details</h4>
       <pre><span><?= $product['meta_description']; ?></span></pre>
    </div>
</section>

<script>
 
</script>

<!-- <section id="product1" class="section-p1">
    <h2>Similar Products</h2>
     <p>Summer Collection New Morden Design</p>
     <div class="pro-container">
       <div class="pro">
         <img src="images/t1.webp" alt="">
         <div class="des">
          <span>adidas</span>
          <h5>Cartoon T-shirt</h5>
          <div class="star">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
          </div>
          <h4><small><i class="fa-solid fa-indian-rupee-sign"></i></small>74</h4>
         </div>
         <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
       </div>
     </div>
     </section> -->


     <?php
        }
        else
         {
          "Product Not Found";
         }
     }
         else
         {
          "Something Went Wrong";
         }
    ?>




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
        
      <?php
      include 'footer.php';
      ?>
      </section>
      
      <script src="./admin/assests/js/custom.js"></script>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script src="script.js"></script>
      <script>

 

</script>

      

      
</body>
</html>