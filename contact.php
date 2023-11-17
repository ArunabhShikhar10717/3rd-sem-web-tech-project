<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Contact Us </title>
<link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="contact-form">
        <h1>Contact Us</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Connect with Us</h2>
                    <form action="contact.php" method="post">
                        <input type="text" name="name" placeholder="Enter Your Name">
                      
                        <input type="email" name="email" placeholder="Enter Your Email">
                        <textarea name="message" placeholder="Your Message"></textarea>  
                         <input class="btn" type="submit" name="send" value="Send">              
             <!-- <button type="submit" class="btn" name="send" >Send <i class="fas fa-paper-plane"></i></button> -->
                    </form>
                </div>
                <div class="form-img">
                    <img src="img/4.png" alt="">
                </div>
            </div>
        </div>
    </div> 
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.709060795768!2d77.03268047538008!3d28.60850367567782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d05dd375e5a13%3A0x108adaa3abe4bd07!2sNetaji%20Subhas%20University%20of%20Technology!5e0!3m2!1sen!2sin!4v1698133664019!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</body>
</html>





<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])) {

   $name =$_POST['name'];
   $email =$_POST['email'];
   $message =$_POST['message'];

   

//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'arunabhshikhar11@gmail.com';                     //SMTP username
    $mail->Password   = 'gprafcsvbstatysh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('arunabhshikhar11@gmail.com', 'Mailer');
    $mail->addAddress('arunabhshikhar11@gmail.com', 'hamari website');     //Add a recipient
    


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'test contact form';
    $mail->Body    = "Sender Name -$name <br> Sender Email- $email <br> message-$message";
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>