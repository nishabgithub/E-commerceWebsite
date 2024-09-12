 <!-- Alertify Js -->
 
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

   <div  class="header none">
    <div class="logo-div">
      <a href="#">
        <div class="logo-div">
          <img src="images/loogo2.png"class="logo" alt="">
          <p class="logo-p">CLARA COUTURE</p>
        </div>
      </a>
     </div>
      <div class="navbar-div">
      <ul id="navbar">
         <li><a href="index.php" class="active">Home</a></li>
         <li><a href="shop.php">Shop</a></li>
         <li><a href="blog.php">Blog</a></li>
         <li><a href="about.php">About</a></li>
         <li><a href="contact.php">Contact</a></li> 
         <?php
                        if (isset($_SESSION['auth'])) {
                            $user_id = $_SESSION['auth_user']['user_id'];

                            // Query to get the count of items in the cart for the current user
                            $sql = "SELECT COUNT(id) AS total_items FROM carts WHERE user_id = '$user_id'";
                            $result = mysqli_query($con, $sql);

                            // Fetch the result
                            $row = mysqli_fetch_assoc($result);
                            $count = $row['total_items'];
                        } else {
                            // If the user is not logged in, set the count to 0
                            $count = 0;
                           
                        }       

                         ?>

                        <li><a href="cart.php"><i class="fa-solid fa-cart-shopping" style="background-color:#E3E6F3;">
                          <?php if ($count > 0) { ?><sup><?php echo $count; ?></sup><?php } ?>
                        </i></a></li>

                         <?php

                        if (isset($_SESSION['auth'])) {
                            $user_id = $_SESSION['auth_user']['user_id'];

                            // Query to get the count of items in the cart for the current user
                            $sql = "SELECT COUNT(id) AS total_items FROM wishlist WHERE user_id = '$user_id'";
                            $result = mysqli_query($con, $sql);

                            // Fetch the result
                            $row = mysqli_fetch_assoc($result);
                            $count = $row['total_items'];
                        } else {
                            // If the user is not logged in, set the count to 0
                            $count = 0;
                          
                        }
                        ?>

                        <li><a href="wishlist.php"><i class="fa-solid fa-heart" style="background-color:#E3E6F3;">
                        <?php if ($count > 0) { 
                        ?><sup><?php echo $count; ?></sup><?php } ?></i></a></li>
                        
                       <li><i class="fa-solid fa-user" onclick="user()" id="icon"></i></li>
        
         <?php

         if(isset($_SESSION['auth']))
         {
           ?>
            <div class="popup nav-pop" id="popup">
            <h3 style="color:black;">Hello <nbsp;><?=$_SESSION['auth_user']['name'];?></h3><br>
            <hr>
             <a href="Profile.php"><button >profile</button></a>
             <a href="address.php"><button>Saved Address</button></a>
             <a href="my-order.php"><button>My Orders</button></a>
             <a href="wishlist.php"><button>Wishlist</button></a>
             <a href="cart.php"><button>Cart</button></a>
             <a href="logout.php"><button>Logout</button></a>
           </div> 
           <?php
         }
         else{              
             ?>
             <div class="popup nav-pop2" id="popup">
             <h3 style="color:black;">Please login or register!</h3><br>
             <hr>
             <a href="registration.php"><button >Register</button></a>
             <a href="login.php"><button>Sign In</button></a>
             </div>
             <?php
            }
         ?>
        </ul>
      </div>
       
    </div>
   
     
    


       <!------------------------------- F O R       M O B I L E       V I E W ----------------------------------->

    <div class="non">
    <div class="head ">
    <div class="logo-div">
      <a href="#"><img src="images/loogo.png" class="logo" alt=""></a>
     </div>
     <div class="drop">
     <!-- <a href="wishlist.php"><i class="fa-solid fa-heart"></i></a> -->
     <!-- <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a> -->
     <a href="#"><i class="fa-solid fa-user" onclick="mobuser()" id="iconmobile"></i></a>
     <a href="#" style="color:black;"><i class="fa-solid fa-bars" onclick="hamburger()" id="icon"></i></a>
     <?php
         if(isset($_SESSION['auth']))
         {
           ?>
            <div class="popup nav-pop" id="popupmobile">
            <h5 style="color:black;">Hello <nbsp;><?=$_SESSION['auth_user']['name'];?></h5><br>
            <hr>
             <a href="Profile.php"><button >profile</button></a>
             <a href="address.php"><button>Saved Address</button></a>
             <a href="my-order.php"><button>My Orders</button></a>
             <a href="wishlist.php"><button>Wishlist</button></a>
             <a href="cart.php"><button>Cart</button></a>
             <a href="logout.php"><button>Logout</button></a>
           </div> 
           <?php
         }
         else{              
             ?>
             <div class="popup nav-pop2" id="popupmobile">
             <h5 style="color:black;">Please login & register!</h5>
             <a href="registration.php"><button >Register</button></a>
             <a href="login.php"><button>Sign In</button></a>
             </div>
             <?php
            }
         ?>
      </div>
      </div>
      <div class="dropdown-list" id="list">
         <a href="index.php" class="active link">Home</a><br><br>
         <a href="shop.php" class="link">Shop</a><br><br>
         <a href="blog.php" class="link">Blog</a><br><br>
         <a href="about.php" class="link">About</a><br><br>
         <a href="contact.php" class="link">Contact</a>
      </div>
    </div>
