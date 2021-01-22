<?php


require_once('PHPMailer-master/class.phpmailer.php');
require_once('PHPMailer-master/class.smtp.php');

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host       = ""; // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 1;                    // set the SMTP port for the server
$mail->Username   = ""; // SMTP account username example
$mail->Password   = "";        // SMTP account password example


$frommail = "";
$fromname = "Support XY";
$mail->SetFrom($frommail, $fromname);

$address = $_POST["tomail"];
$adrname = $_POST["toname"];
$mail->AddAddress($address, $adrname);


$mail->Subject = $_POST["Subject"];
$mail->Body = $_POST["msg"];

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  header('Location: ../');
}

 ?>
