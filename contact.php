<?php
session_start();
include('./admin/functions/authcode.php');
?>
<?php
// session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "phpecom";

// Creating database connection
$con = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if(isset($_POST['submit'])) {
    // Sanitize input
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Insert into the database
    $query = "INSERT INTO emails (email) VALUES ('$email')";
    if(mysqli_query($con, $query)) {
      $_SESSION['message'] = "subscribed successfully";
      header('Location: ');
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Close the connection
// mysqli_close($con);
?>


<?php
$msg="";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
	$name= ($_POST['name']);
	$email=($_POST['email']);
	$subject=($_POST['subject']);
	$message=($_POST['message']);

	// mysqli_query($con,"insert into contact_us(name,email,mobile,comment) values('$name','$email','$mobile','$comment')");
	// $msg="Message has been successfully sent!";
	
	// $html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Mobile</td><td>$mobile</td></tr><tr><td>Comment</td><td>$comment</td></tr></table>";
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tsl";
	$mail->SMTPAuth=true;
	$mail->Username="psstechno80@gmail.com";
	$mail->Password="tpsd zseo wgsi vvpg";
	$mail->SetFrom("psstechno80@gmail.com");
	$mail->addAddress("psstechno80@gmail.com");
	$mail->IsHTML(true);
	$mail->Subject="Clara Contact Details";
	$mail->Body= " Name - $name
	<br>  Email - $email 
	<br>  Subject - $subject 
	<br>  Message - $message";
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo $msg;
	}else{
		//echo "Error occur";
	}
	// echo $msg;
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
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body style="background-color: #f8f8fc;">
    <section>
     <?php include 'nav.php';?>
    </section>

    <section class="contact-header">
      <h2>Contact us</h2>
      <p>for more information</p>
    </section>

    <section id="contact-details" class="section-p1">
    <div class="details">
    <span>GET IN TOUCH</span>
    <h2>Visit one of our agency location or contact us today</h2>
    <h3>Head Office</h3>
    <div>
        <li>
        <i class="fa-solid fa-map"></i>
            <p>H-block BSI Tower third floor, office no 305</p>
        </li>
        <li>
        <i class="fa-solid fa-envelope"></i>
            <p>clara@gmail.com</p>
        </li>
        <li>
        <i class="fa-solid fa-phone"></i>
            <p>+91:- xxxxxxxxxx</p>
        </li>
        <li>
        <i class="fa-solid fa-clock"></i>
            <p>Delivery Time: 9:00am to 7:00pm</p>
        </li>
    </div>
    </div>

     <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.990537429024!2d77.37892669999998!3d28.63004570000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ceff8864e0cf1%3A0xa20290bf75099ebd!2sBSI%20Business%20Park%20H15!5e0!3m2!1sen!2sin!4v1704173235014!5m2!1sen!2sin" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </section>

    <section id="form-details">
      <form action="#" method="post" id="frmContactus">
        <span>LEAVE A MESSAGE</span>
        <h2>We love to hear from you</h2>
        <input type="text" name="name" id="name" placeholder="Your Name" required>
        <!-- <input type="tel" name="phone" id="phone" placeholder="Your number"> -->
        <input type="email" name="email" id="email" placeholder="E-Mail" required>
        <input type="text" name="subject" id="subject" placeholder="Subject" required>
        <textarea  name="message" id="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
        <!-- <button class="normal">Submit</button>   -->
        <input type="submit" value="Send Message" class="normal" id="submit"  name="submit" >    
      </form>

      <div class="people">
        <div>
          <img src="images/people-1.jpg" alt="">
          <p><span>John Doe</span>Senior Marketing Manager <br>Phone: + xxxxxxxxx <br>Email : clara@gmail.com</p>
        </div>
        <div>
          <img src="images/people-2.jpg" alt="">
          <p><span>David William</span>Senior Marketing Manager <br>Phone: + xxxxxxxxx <br>Email : clara@gmail.com</p>
        </div>
        <div>
          <img src="images/people-3.jpg" alt="">
          <p><span>Emma Cruise</span>Senior Marketing Manager <br>Phone: + xxxxxxxxx <br>Email : clara@gmail.com</p>
        </div>
      </div>
    </section>
   
    

    <section id="newsletter" class="section-p1">
        <div class="newstext">
          <h4>Sign Up For Newsletters</h4>
          <p>Got E-mail updates about our latest shop and <span> special offers.</span></p>
        </div>
        <div class="form">
          <form action="" method="post" class="form">
          <input type="email" class="email" name="email" id="email" placeholder="Your email address" required>
          <button class="normal" onclick="window.location.reload();" type="submit" id="submit" name="submit" value="Subscribe">Subscribe</button>
          </form>
        </div>
      </section>

      <section>
      <?php include 'footer.php';?>
      </section>
      <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });
 </script>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
      <script>
         jQuery('#frmContactus').on('submit', function(e) {
             // jQuery('#message').html('');
             jQuery('#submit').html('Please wait');
             jQuery('#submit').attr('disabled', true);
             jQuery.ajax({
               url: 'contact.php',
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
     <script>

             $(document).ready(function(){
                $("#name").on('input', function(){
                  var letter = /[^a-zA-Z]/g;
                  if($(this).val().match(letter))
                  {
                    $(this).val($(this).val().replace(letter, ""))
                  }
                })
             })
     </script>
     <script>
      const info = document.querySelector(".alert-info");

 function process(event) {
 event.preventDefault();

 const phoneNumber = phoneInput.getNumber();

 info.style.display = "";
 info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
}
function getIp(callback) {
 fetch('https://ipinfo.io/json?token=<your token>', { headers: { 'Accept': 'application/json' }})
   .then((resp) => resp.json())
   .catch(() => {
     return {
       country: 'us',
     };
   })
   .then((resp) => callback(resp.country));
}
// const phoneInput = window.intlTelInput(phoneInputField, {
//  initialCountry: "auto",
//  geoIpLookup: getIp,
//  utilsScript:
//    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
// });
     </script>
</body>
</html>