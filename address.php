  
  <?php
  include('./admin/functions/userfunction.php');
  // include('./admin/functions/authcode.php');
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
<body>

    
<section>
<?php include 'nav.php';?>
</section>

<section class="add-main-sec">
  <h3>Account</h3>
  <?php 
        if(isset($_SESSION['auth'])){
          $userId = $_SESSION['auth_user']['user_id'];
           $sql="SELECT * FROM registration WHERE Sno='$userId'";
           $result=mysqli_query($con,$sql);
          while($row=$result->fetch_assoc()){

          
        ?>
  <h5>Hello_<?php echo $row["name"]; ?></h5>
  <?php
   }
  }?><br>
 <hr>
  <div class="add-cont"> 
   <div class="add-cont-inner-1">
   <ul type="none">
       <li><a href="profile.php" style="text-decoration:none; color:black;">Profile</a></li><br><hr>
       <li><a href="my-order.php" style="text-decoration:none; color:black;">Orders</a></li><br><hr>
       <li><a href="address.php" style="text-decoration:none; color:black;">Address</a></li><br><hr>
       <li><a href="wishlist.php" style="text-decoration:none; color:black;">wishlist</a></li><br><hr>
      </ul>
    </div>
    <div class="add-cont-inner-2">
          <div>
          <h3>Saved Address</h3>
          <br><br>
          <h5>Default Address</h5>
          </div>
        
      <div class="add-cont-list-inner-div-2-upper">
      <?php 
        if(isset($_SESSION['auth'])){
          $userId = $_SESSION['auth_user']['user_id'];
           $sql="SELECT * FROM address WHERE user_id='$userId'";
           $result=mysqli_query($con,$sql);
          while($row=$result->fetch_assoc()){
      ?>
      <div class="add-cont-list-inner-div-2">
        <ul type="none">
          <li><?php echo $row["name"]; ?></li>
          <br>
          <li><?php echo $row["email"]; ?></li>
          <li><?php echo $row['place']; ?></li>
          <li><?php echo $row['area']; ?></li>
          <li><?php echo $row['city']; ?></li>
          <li><?php echo $row['pincode']; ?></li>
          <li><?php echo $row['state']; ?></li>
          <br>
         <li><?php echo $row['number']; ?></li>
      </ul>
      </div>
      <?php
   }
  }?>
      </div>
   
    </div>
  </div>
  
  </section>
 

    
<section>
      <?php include 'footer.php';?>
      </section>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>
</html>