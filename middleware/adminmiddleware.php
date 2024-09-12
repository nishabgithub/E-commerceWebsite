<?php
session_start();
include('../admin/functions/myfunction.php');

if(isset($_SESSION['auth']))
{
  if($_SESSION['role_as'] != 1)
 {
    $_SESSION['message'] = "You are not authorised to access this page";
    header('Location:../login.php');
 }
}
else{
    $_SESSION['message'] = "Login To Continue";
    header('Location: ../login.php');
}
// else{
//     $_SESSION['message'] = "hupp";
//     header('Location:../index.php');
// }
?>