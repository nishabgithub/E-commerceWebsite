<?php
session_start();
include('admin/config/dbcon.php');
include('./admin/functions/authcode.php');

if(isset($_SESSION['message']))
{
    ?>
    <div
    class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>hey!</strong><?= $_SESSION['message']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['message']);
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
    </section> -->
<div class="login-form">
<div class="name">
   <h2> Clara.in</h2>
    </div>
<div class="reg-form">
<section id="form">
<form action="" method="post">
        <h2>Login to your Account.</h2>
        <input type="email" name="email" id="email" placeholder="E-Mail" required>
        <input type="password" name="password" id="password" placeholder="password" required>
        <!-- <button class="reg-button">Login</button> -->
        <input type="submit" class="log-button" value="Login" id="submit" name="login" >
</form>
     <a href="registration.php">Don't have an account.</a>
</section>

</div>
</div>
    

   <script src="script.js"></script>
</body>
</html>