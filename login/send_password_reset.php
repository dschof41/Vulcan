<?php
/*
	This script emails the user the name and address of the selected business.
*/

$to = $_SESSION['emailAddress'];
$encEmail = urlencode(base64_encode($_SESSION['emailAddress']));

include 'reset_email_body.php';
//$message = "<p>Here is the address you wanted!<p>Business :".$name."</p><p>Location: <a href=https://www.google.com/#q=".$urlAddress.">".$address."</a><p>Thanks for using Venturify!!</p>"; ;
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailer-master/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.mail.yahoo.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "schofdaddy@yahoo.com";

//Password to use for SMTP authentication
$mail->Password = "surfing124";

//Set who the message is to be sent from
$mail->setFrom('schofdaddy@yahoo.com', 'Admin');

//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($to);//, 'John Doe');

//Set the subject line
$mail->Subject = 'Venturify Password Reset';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message, dirname(__FILE__), true);

//Replace the plain text body with one created manually
//$mail->Body = 'Here is the address you wanted!: ' . $address;
$mail->AltBody ="Here's your link\nThanks for using Venturify!";

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    $_SESSION['message'] = "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message sent!";
    //$_SESSION['message'] = "Email sent!!";
}


?>
