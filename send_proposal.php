<?php

//include PHPMailerAutoload.php
require 'phpmailer/PHPMailerAutoload.php';

//create an instance of PHPMailer
$mail = new PHPMailer();

//set a host
$mail->Host = "smtp.gmail.com";

//enable SMTP
$mail->isSMTP();
// $mail->SMTPDebug = 2;

//set authentication to true
$mail->SMTPAuth = true;

//set login details for Gmail account
$mail->Username = "lc.luochao@gmail.com";
$mail->Password = "Aa5858692";

//set type of protection
$mail->SMTPSecure = ""; //or we can use TLS

//set a port
$mail->Port = 587; //or 587 if TLS

//set subject
$mail->Subject = "Proposal email";

//set HTML to true
$mail->isHTML(true);

//set body
$mail->Body = "this is our body...<br /><br /><a href='http://google.com'>Google</a> ";

//add attachment
$mail->addAttachment("upload/cap_table.pdf", 'Proposal.pdf');
// $mail->addStringAttachment($file, 'Payment Receipt.pdf');

//set who is sending an email
$mail->setFrom('lc.luochao@gmail.com', 'lc');

//set where we are sending email (recipients)
$mail->addAddress('lc.luochao@gmail.com');

//send an email
if ($mail->send()) {
    $message = "Proposal was sent successully!";
	echo "<script type='text/javascript'>alert('$message');</script>";
    header("location: job_listing.php");
}
else {
    echo $mail->ErrorInfo;
}


//sendmail (not through PHPMailer)
// $to_email = "lc.luochao@gmail.com";
// $subject = "Simple Email Test via PHP";
// $body = "Hi,nn This is test email send by PHP Script";
// $headers = "From: whizmotech@gmail.com";
 
// if (mail($to_email, $subject, $body, $headers)) {
//     echo "Email successfully sent to $to_email...";
// } else {
//     echo "Email sending failed...";
// }



?>