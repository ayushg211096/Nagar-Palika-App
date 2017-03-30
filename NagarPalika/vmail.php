<?php
require 'PHPMailer/PHPMailerAutoload.php';
//$recidto=$_GET['to'];
 function vmail($recid,$un,$up,$smtphost,$smtpport,$smtpsecure,$sendname,$subj,$msgbody,$htmlfileref)
 {
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTPP
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';

$mail->Host = $smtphost;                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $un;                   // SMTP username
$mail->Password = $up;               // SMTP password
$mail->SMTPSecure = $smtpsecure;                            // Enable encryption, 'ssl' also accepted
$mail->Port = $smtpport;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom($un, $sendname);     //Set who the message is to be sent from
$mail->addAddress($recid);               // Name is optional
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
//$mail->addAttachment('images/phpmailer_mini.png', 'new.png'); // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = $subj;
$mail->Body    = $msgbody;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

//$mail->msgHTML(file_get_contents($htmlfileref), dirname(__FILE__));
$mail->msgHTML($htmlfileref);
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
else
{

echo 'Message has been sent to '.$recid.'<br />';	
}
 }
 ?>