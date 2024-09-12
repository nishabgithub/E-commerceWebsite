  
  <?php
  include('./admin/functions/userfunction.php');
  // include('./admin/functions/authcode.php');
  include('authenticate.php');
  include('admin/config/dbcon.php');
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
          <h3>your Profile</h3>
          

             <div id="form" >
             <?php 
                 if(isset($_SESSION['auth'])){
                 $userId = $_SESSION['auth_user']['user_id'];
                 $query = "SELECT * FROM address WHERE user_id='$userId' ORDER BY id DESC LIMIT 1  ";
                 // Execute the SQL query
                 $result = mysqli_query($con, $query);
                 if($result && mysqli_num_rows($result) > 0) { // Check if query was successful and if there are rows returned
                  // Fetch and display address details
                 while($row = mysqli_fetch_assoc($result)){
                  ?>
                 <div  id="edit"> 
                 <div class="edit-button">
                 <button onclick="edit()" class="add-address">Edit Address</button>
                 </div>
                   <div class="profile-div">
                    <div>
                      <h3>Contact Details</h3>
                    </div><hr>
                   <div>
                    <p>NAME</p> 
                    <p><?php echo $row['name']; ?></p>
                  </div>
                   <div>
                    <p>NUMBER</p>
                    <p><?php echo $row['number']; ?></p>
                   </div>
                   <div>
                    <p>Email</p>
                    <p><?php echo $row['email']; ?></p>
                   </div>
                   <div
                   ><p>PLACE</p>
                   <p><?php echo $row['place']; ?></p>
                  </div>
                   <div>
                    <p>AREA</p>
                    <p><?php echo $row['area']; ?></p>
                   </div>
                   <div>
                    <p>LANDMARK</p>
                    <p><?php echo $row['landmark']; ?></p>
                   </div>
                   <div>
                    <p>PINCODE</p>
                    <p><?php echo $row['pincode']; ?></p>
                   </div>
                   <div>
                    <p>CITY</p>
                    <p><?php echo $row['city']; ?></p>
                   </div>
                   <div>
                    <p>STATE</p>
                    <p><?php echo $row['state']; ?></p>
                  </div>
                   </div>
                          
                 </div>
            
                 <div id="save" class="save-div">
                <form action="admin/functions/edit-address.php" method="POST" id="frmContactus">
                <input type="hidden" id="order_id" name="id" value="<?php echo $row['id'] ?>">
                <label for="name">Full name (First and Last name)</label>
                <input type="text" class="input-hide" name="name" id="name" value="<?php echo $row['name']; ?>" required>
                <label for="name">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>"required>
                <label for="number">Mobile Number</label>
                <input type="tel" name="number" id="number" onkeyup="numberonly(this)"  value="<?php echo $row['number']; ?>" required maxlength="10">
                <label for="place">Flat, House no, Building, Company, Apartment</label>
                <textarea name="place" id="place" placeholder="Address" required><?php echo $row['place']; ?></textarea>
                <label for="area">Area, Street, Sector, Village</label>
                <input type="text" name="area" id="area" value=" <?php echo $row['area']; ?>" placeholder="" required>
                <label for="landmark">Landmark</label>
                <input type ="text" name="landmark" id="landmark" value="<?php echo $row['landmark']; ?>" placeholder="e.g near apollo hospital" required>
                <label for="pincode">Pincode</label>
                <input type="tel" name="pincode" id="pincode" value="<?php echo $row['pincode']; ?> " onkeyup="numberonly(this)" placeholder="Pincode" maxlength="6" minlength="6" required>
                <label for="city">Town/City</label>
                <input type="text" name="city" id="city" value=" <?php echo $row['city']; ?>" placeholder="" required>
                <label for="state">State</label>
                <select name="state" id="state" value=" <?php echo $row['state']; ?>" required style="height:30px">
                    <option value=""><?php echo $row['state']; ?></option>
                    <option value="Uttra khand">Uttra khand</option>
                    <option value="Uttarpradesh">Uttar pradesh</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh	">Chhattisgarh	</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="West Bengal">West Bengal</option>
                    <!-- Other options -->
                </select>
                <input type="hidden" name="payment_mode" value="COD">
                </select> 
                <button onclick="save()" class="save" type="submit" name="edit-address">Save Address</button>
                </div>
                </div>
            
            </form>
            </div>
            </div>  
         
          
          <?php
             } 
            }
        } 
            // Display form for new address
    ?>
   
    </div>
  </div>
  
  </section>
 

    
<section>
      <?php include 'footer.php';?>
      </section>
      <script src="./script.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>