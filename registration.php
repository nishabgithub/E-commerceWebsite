<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['password'])){
$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$password = $_POST["password"];

$conn = mysqli_connect("localhost" , "root" , "" , "phpecom") or die("connection failed");
$sql = "INSERT INTO registration(name ,email,number,password)
VALUES('{$name}' , '{$email}', '{$number}' , '{$password}' )";
$result = mysqli_query($conn , $sql) or die ("query failed");
mysqli_close($conn);
}
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
<body style="background-image: url(https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg);">
  <!-- <section >
     <?php include 'nav.php';?>
    </section>  -->
    <div class="name">
   <h2> Clara.in</h2>
    </div>
<div class="reg-form">
<section id="form">
<form action="#" method="post" id="frmContactus">
        <h2>Create Account</h2>
        <input type="text" name="name" id="name" placeholder="Your Name" required>
        <input type="email" name="email" id="email" placeholder="E-Mail" required>
        <input type="tel" name="number" id="number" onkeyup="numberonly(this)" placeholder="number" required>
        <input type="password" name="password" id="password" placeholder="password" required>
        <!-- <input class="reg-button" type="submit" value="Create"> -->
        <input type="submit" class="reg-button" value="Create" id="submit" name="submit" >
       
        <p>By continuing, you agree to Clara's <span>Conditions of Use</span> and <span>Privacy Notice</span>.</p>
</form>
     <a href="login.php">Already have an account.</a>
</section>

</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
 

 <script>
    jQuery('#frmContactus').on('submit', function(e) {
             // jQuery('#message').html('');
             jQuery('#submit').html('Please wait');
             jQuery('#submit').attr('disabled', true);
             jQuery.ajax({
               url: 'registration.php',
               type: 'post',
               data: jQuery('#frmContactus').serialize(),
               success: function(result) {
                 // jQuery('#message').html(result);
                 jQuery('#submit').html('Submit');
                 jQuery('#submit').attr('disabled', false);
                 jQuery('#frmContactus')[0].reset();
               }
             });
             e.preventDefault();
           });
 </script>


</body>
</html>