<footer class="section-f1">
        <div class="footer">
          <div class="">
            <h4>Contact</h4>
            <p><strong>Address:</strong>Noida Sector-63 block h-15 BSI <br>
              Tower Third floor office no 305</p>
            <p><strong>Phone:</strong>+91xxxxxxxxxx</p>  
            <p><strong>Email:</strong>clara@gmail.com</p>  
            <div class="follow">
              <h4>Follow Us</h4>
              <div class="icon">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin-in"></i>
              </div>
            </div> 
          </div>
  
          <div class="col coll">
            <h4>About</h4>
            <a href="about.php">About Us</a>
            <a href="my-order.php">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="contact.php">Contact Us</a>
          </div>
  
          <div class="col">
            <h4>My Account</h4>
            <!-- <a href="#">Sign In</a> -->
            <a href="cart.php">View Cart</a>
            <a href="wishlist.php">My Wishlist</a>
            <a href="my-order.php">Track My Order</a>
            <a href="#">help</a>
          </div>
  
        </div>
        <!-- <div class="col install">
          <h4>Install App</h4>
          <p>From App Store or Google Play Store</p>
        </div> -->
        <br><br>
       <hr>
        <div class="copyright">
          <p>© 2023, Clara Shopping Website.</p>
        </div>




         <!-- Alertify JS -->
   <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>

      
      alertify.set('notifier','position', 'top-center');
      <?php
          if(isset($_SESSION['message']))
          { 
            ?>
             
             alertify.success('<?= $_SESSION['message']; ?>');
            <?php 
             unset($_SESSION['message']);
         } 
    ?>
    </script>
      </footer>