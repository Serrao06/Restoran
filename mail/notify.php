
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings Signed out
 

//  if(isset($_POST['submit']))
// {

  $name = $_GET['name'];
  $email = $_GET['email'];
  $subject = $_GET['subject'];
  $message = $_GET['message'];
  $val = $_GET['val'];
 


    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'serraonevil@gmail.com';                     // SMTP username
    $mail->Password   = 'qyoarmatuzjuiwdz';                               // SMTP password
    $mail->SMTPSecure = 'ssl';;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, 'Admin');
    $mail->addAddress($email, 'user');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $name . "<br>". $email . "<br>". $message; 
   
     
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    // $mail->AddEmbeddedImage($image); 

    $mail->send();

     //what you should do after sending mail
     if ($val == 1) {
    echo"<script>
            alert('Your email sent sucessfully!!!');
            window.location.href='../admin/template/verify.php';
          </script>";

    exit();
     }
     elseif ($val == 2) {
      echo"<script>
            alert('Your email sent sucessfully!!!');
            window.location.href='../admin/template/payment.php';
          </script>";

    exit();

     }
     else {
      echo"<script>
            alert('Your email sent sucessfully!!!');
            window.location.href='../admin/template/orders.php';
          </script>";

    exit();
     }

}

// }
 catch (Exception $e) {
  
  //error if somthing went wrong

    echo '<script>alert("Message could not be sent.");
            window.location.href="../contact.php";
            </script>';
}
?>
