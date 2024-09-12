<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
// include('./admin/functions/edit-address.php');
// include('./admin/functions/authcode.php');
// include('authenticate.php');
include('./admin/config/dbcon.php');

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

<?php 
if(isset($_SESSION['auth'])){
  $userId = $_SESSION['auth_user']['user_id'];
  $query = "SELECT * FROM address WHERE user_id='$userId' ORDER BY id DESC LIMIT 1 ";
  // Execute the SQL query
  $result = mysqli_query($con, $query);
  if($result && mysqli_num_rows($result) > 0) { // Check if query was successful and if there are rows returned
      // Fetch and display address details
      while($row = mysqli_fetch_assoc($result)){
  ?>
           <div>
           <button id="icon3" onclick="editform()" class="add-address" <?php echo $row['user_id']; ?>>Edit button</button>
          </div>
              <div id="popup3" class="popup-3">
              <button id="icon3" onclick="editform()" class="cross">x</button> 
              <div class="popup-form">
              <form action="admin/functions/edit-address.php" method="post"  >
                <h2>Address Details</h2>
                <input type="hidden" name="address_id" value="<?php echo $row['id'] ?>">
                <label for="name">Full name (First and Last name)</label>
                <input type="text" name="name" id="name"value="<?php echo $row['name']; ?>" required>
                <label for="number">Mobile Number</label>
                <input type="tel" name="number" id="number" onkeyup="numberonly(this)"  value="<?php echo $row['number']; ?>" required maxlength="10">
                <h6>may be used to assist delivery</h6><br>
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
                    <option value="">State</option>
                    <option value="Uttrakhand">Uttrakhand</option>
                    <!-- Other options -->
                </select> <br>
                <p>By continuing, you agree to Clara's <span>Conditions of Use</span> and <span>Privacy Notice</span>.</p>
                <input type="hidden" name="payment_mode" value="COD">
                <button type="submit" name="edit-address">Save Address</button>

            </form>
            </div>
            </div>
  
  <?php
   }
} 
}
?>

 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 <script src="./script.js"></script>

</body>
</html>