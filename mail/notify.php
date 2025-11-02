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

  function loadEnv($path)
  {
    if (!file_exists($path)) {
      return false;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
      // Skip comments
      if (strpos(trim($line), '#') === 0) {
        continue;
      }

      // Split the line into key and value
      list($key, $value) = explode('=', $line, 2);

      $key = trim($key);
      $value = trim($value);

      // Set the environment variable
      putenv(sprintf('%s=%s', $key, $value));
      $_ENV[$key] = $value;
      $_SERVER[$key] = $value; // Also set in $_SERVER for broader access
    }
    return true;
  }

  // Specify the path to your .env file
  $envFilePath = __DIR__ . '../../.env';

  if (loadEnv($envFilePath)) {

    $name = $_GET['name'];
    $email = $_GET['email'];
    $subject = $_GET['subject'];
    $message = $_GET['message'];
    $val = $_GET['val'];



    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = getenv('EMAIL_HOST');                    // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = getenv('EMAIL_USER');                     // SMTP username
    $mail->Password = getenv('EMAIL_PASS');                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = getenv('EMAIL_PORT');                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, 'Admin');
    $mail->addAddress($email, 'user');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $name . "<br>" . $email . "<br>" . $message;


    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    // $mail->AddEmbeddedImage($image); 

    $mail->send();

    //what you should do after sending mail
    if ($val == 1) {
      echo "<script>
            alert('Your email sent sucessfully!!!');
            window.location.href='../admin/template/verify.php';
          </script>";

      exit();
    } elseif ($val == 2) {
      echo "<script>
            alert('Your email sent sucessfully!!!');
            window.location.href='../admin/template/payment.php';
          </script>";

      exit();

    } else {
      echo "<script>
            alert('Your email sent sucessfully!!!');
            window.location.href='../admin/template/orders.php';
          </script>";

      exit();
    }
  } else {
    echo "Error: .env file not found at " . $envFilePath . "\n";
  }

}

// }
catch (Exception $e) {

  //error if somthing went wrong

  echo '<script>alert("Message could not be sent.");
             window.location.href="../contact.html";
            </script>';
}
?>