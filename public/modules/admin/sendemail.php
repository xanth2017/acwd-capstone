<?php
require '../../includes/autoload.php';
ob_start();
use classes\business\UserManager;
use classes\business\MailManager;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use classes\entity\Mail;
use classes\entity\MailLink;
require '../../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../../../classes/entity/Mail.php';
require '../../../classes/entity/MailLink.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$recipents = $_REQUEST['ids'];
$UM = new UserManager();
$MM = new MailManager();

$users = $UM->getUsersById($recipents);



if($recipents){
  $recipents_array = explode(",", $recipents);
  if(count($recipents_array) <=0){
    header("Location: ./searchuser.php");
    die();
  }
}



$subject = $_REQUEST['subject'];
$comment = $_REQUEST['comment'];


$mailer = new PHPMailer(true);                              // Passing `true` enables exceptions
//Server settings
$mailer->SMTPDebug = 2;                                 // Enable verbose debug output
$mailer->isSMTP();                                      // Set mailer to use SMTP
$mailer->Host = 'in-v3.mailjet.com';  // Specify main and backup SMTP servers
$mailer->SMTPAuth = true;                               // Enable SMTP authentication
$mailer->Username = 'e4df8319c969ce0cdaddfa33bc211f1c';                 // SMTP username
$mailer->Password = '48383289a3f64628a05cc0fe92cceb26';                           // SMTP password
$mailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mailer->Port = 587;
$mailer->setFrom('x_anakha@hotmail.com', 'Mailer');
$mailer->SMTPDebug = 1;

$mail = new Mail();
$mail->emailBody=$comment;
$mail->emailSubject=$subject;
$MM->saveMail($mail);
$mail = $MM->getLatestMail();

foreach ($users as $key => $value) {
  try {
    $name = $value->firstName. " ". $value->lastName;
    $mailer->addAddress($value->email, $name);     // Add a recipient
    $mailer->isHTML(true);                                  // Set email format to HTML
    $mailer->Subject = $mail->emailSubject;
    $mailer->Body = $mail->emailBody;
    $mailer->send();
    $mailLink = new MailLink();
    $mailLink->emailId = $mail->emailId;
    $mailLink->userId = $value->id;
    $mailLink->status = 1;
    $MM->saveMailLink($mailLink);
  }catch (Exception $e) {

    $mailLink = new MailLink();
    $mailLink->emailId = $mail->emailId;
    $mailLink->userId = $value->id;
    $mailLink->status = 0;
    $MM->saveMailLink($mailLink);
  }
}


header("Location: emaillist.php");
exit;


?>
