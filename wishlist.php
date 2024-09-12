  
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
    <link href="images/loogo.png" rel="icon" >
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body style="background-color: #f8f8fc;">
<section>
     <?php include 'nav.php';?>
</section>


<?php
$items = getwishItems();
?>

<section class="cart-page">
    <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
</section>

    <section id="product1" class="section-p1">
    <h2 class="my-wish-heading">My Wishlist</h2>
            <?php
            if(mysqli_num_rows($items) > 0) {
                foreach($items as $citem) { 
            ?>
            <div class="pro-container"data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="800" >
            <a href="details.php?product=<?= $citem['slug']; ?>" class="link">
             <div class="pro"
            >
             <img src="uploads/<?= $citem['image']; ?>" alt="">
             </a>
            <div class="wish">
            <ul type="none">
                <li class="wish-item-li"><?= $citem['name']; ?></li>
                <li class="wish-item-li">Rs.<?= $citem['selling_price']; ?></li>
            </ul>
            <hr>
            <button class="deletewishItem remove" onclick="window.location.reload();"  value="<?= $citem['cid'] ?>"><i class="fa fa-trash"></i>&nbsp;Remove</button>
            <!-- <button type="button" class="addtocartbtn wish-cart-btn" value="<?= $citem['pid']; ?>">Add To Cart</button> -->
            </div>
            </div>
      
  </div>
            <?php
                }
            } else {
                echo "No data available";
            }
            ?>
</div>
</section>
<hr>

      <?php include 'footer.php';?>
      </section>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>

    <!---------------------------- aos animation script ------------------------------------>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>