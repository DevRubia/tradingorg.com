<?php
session_start();
$userProperties = $_SESSION['userProperties'];
if(isset($_POST['sendhelp'])){
    $message = $_POST['message'];
    $Requestemail=$userProperties['userEmail'];
    $requestName=$userProperties['name'];

}
require './phpmailer/includes/PHPMailer.php';
require './phpmailer/includes/SMTP.php';
require './phpmailer/includes/Exception.php';

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
$userProperties = $_SESSION['userProperties'];
$name=$userProperties['name'];
$usermail=$userProperties['userEmail'];

$mail = new PHPMailer(true);
//Set mailer to use smtp
try{
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
//Set gmail username
$mail->Username = "helpdesk.24hrfxtradingorg@gmail.com";
//Set gmail password
$mail->Password = "opnytybzkqaymojo";
//Email subject
$mail->Subject = "Deposit statement Received";
//Set sender email
$mail->setFrom('rubialincon8@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Attachment
//$mail->addAttachment('img/attachment.png');
//Email body
$mail->Body = "<h3>
Hello, Admin .I am $requestName
</h3>
<h3>
My Email: $Requestemail
</h3>
<h3>
Kindly review my issue on :
<h4>
$message
</h4>
<h4>contacted you via help desk on your website.</h4>
<h5>The 24hrfx Trading Org Team.</h5>
</h3> ";
//Add recipient


$mail->addAddress('helpdesk.24hrfxtradingorg@gmail.com');
if ( $mail->send() ) {
    $_SESSION['status']=" Successfully contacted help desk, stay connected with us. reviewing your issue ";
    header('Location: newDashboard.php');
    exit();
    
}else{
    
    $_SESSION['status']="Issue request failed to deploy: Server Error!!=?404";
    header('Location: newDashboard.php');
    exit();
    
}
}catch(Exception $e){
    $_SESSION['status']="failed!!!";
    header('Location: newDashboard.php');
    exit();
}
//Closing smtp connection
$mail->smtpClose();

?>