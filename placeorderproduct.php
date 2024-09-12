<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
session_start();
// echo"working";

include('../config/dbcon.php');
?>
<?php
if(isset($_SESSION['auth']))                                                                                               
{
if (
    isset($_POST['order_id']) &&
    isset($_POST['prod_id']) &&
    isset($_POST['qty']) &&
    isset($_POST['cart_total'])
) {
    // Assuming your database connection is stored in $con
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "phpecom";

    // Creating database connection
    $con = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        // Handle the error or redirect as needed
    }

    // Escape user inputs to prevent SQL injection
    $order_id = mysqli_real_escape_string($con, $_POST['order_id']);
    $prod_id = mysqli_real_escape_string($con, $_POST['prod_id']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $cart_total = mysqli_real_escape_string($con, $_POST['cart_total']);
    $payment_id = isset($_POST['payment_id']) ? mysqli_real_escape_string($con, $_POST['payment_id']) : null;
    $size = mysqli_real_escape_string($con, $_POST['size']);
    $order_status = mysqli_real_escape_string($con, $_POST['order_status']);

    // Perform the SQL query to insert order items
    $query = "INSERT INTO order_items (order_id, prod_id, qty, cart_total, payment_id, size, order_status ) VALUES ('$order_id', '$prod_id', '$qty', '$cart_total', '$payment_id' ,'$size' , '$order_status')";
   
    if (mysqli_query($con, $query)) {
        echo "Record added successfully";
        
        // Add any additional actions after a successful query
        
        // Delete cart items if user_id is provided

            $userId =  $_SESSION['auth_user']['user_id'];
            $deleteCartQuery = "DELETE FROM carts WHERE user_id='$userId'";
            if (mysqli_query($con, $deleteCartQuery)) {
                echo "Cart items deleted successfully";
            } else {
                echo "Error deleting cart items: " . mysqli_error($con);
                // Handle the error or redirect as needed
            }
        
        
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
        // Handle the error or redirect as needed
    }

    // Close the connection
    mysqli_close($con);
}}
?>




