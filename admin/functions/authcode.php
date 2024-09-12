<?php

if(isset($_POST ['login']))
  {  
    $email = mysqli_real_escape_string($con , $_POST['email']);
    $password = mysqli_real_escape_string($con , $_POST['password']);

    $login_query = " SELECT * FROM registration WHERE email = '$email' AND password = '$password' ";
    $login_query_run = mysqli_query($con , $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
      $_SESSION['auth'] = true;

     $userdata = mysqli_fetch_array($login_query_run);
     $userid = $userdata['Sno'];
     $username = $userdata['name'];
     $useremail = $userdata['email'];
     $role_as = $userdata['role_as'];

     $_SESSION['auth_user'] = [
        'user_id' => $userid,
        'name' => $username,
        'email' => $useremail
      ];
    
      $_SESSION['role_as'] = $role_as;
      if($role_as == 1)
     {
        $_SESSION['message'] = "Welcome To Dashboard";
        header('Location: ./admin/index.php');
     }
     else
     {
        $_SESSION['message'] = "Logged In Successfully";
        header('Location: index.php');
     }
    }
    else
    {
     $_SESSION['message'] = "Invalid Credentials";
     header('Location: login.php');
     }
   } 
?>
