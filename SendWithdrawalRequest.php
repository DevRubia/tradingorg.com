<?php

include('authentication.php');
$userProperties = $_SESSION['userProperties'];

$timestamp=time();
$formatDate = "Y-m-d";
$formatTime="h:i:s A";
$currentDate = date($formatDate);
$time = date($formatTime, $timestamp, );

if(isset($_POST['withdraw'])){

//setwithdrawalRequestDetail
$paymentType=$_SESSION['paymentType'];
$accountNo=$_SESSION['accountNo'];
$accountName=$_SESSION['accountName'];
$withdrawable=$_SESSION['withdrawable'];

//insuranceTransactionId
$insuaranceTransactionId=$_SESSION['insuaranceTransactionId'];

//withdrawalTransactionId
$insuaranceTransactionIdW=$_SESSION['insuaranceTransactionIdW'];
    
    //Begin Email Send
}
//Include required PHPMailer files

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
$mail->Username = "rubialincon8@gmail.com";
//Set gmail password
$mail->Password = "wjopfhynspwgvrnh";
//Email subject
$mail->Subject = "Withdrawal Request Received";
//Set sender email
$mail->setFrom('rubialincon8@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Attachment
//$mail->addAttachment('img/attachment.png');
//Email body
$mail->Body = "<h3>
Hello, $name

We have received your withdrawal request for $ $withdrawable USD.
<h4>Deposited made to: Account Number: $accountNo</h4>
<h4>Deposited made to: Account Name: $accountName</h4>
<h4>Deposited via, Account Type: $paymentType </h4>

Withdrawal request is being processed... 
We aim to process all withdrawals within 24 hours, but it may take longer depending on the queue. We will let you know when the process is completed.

For card withdrawals, it will take 5 to 15 working days for your funds to appear in your account, depending on the card’s issuing bank.

If you have any questions, contact us via help desk on our website.
<h5>The 24hrfx Trading Org Team. $currentDate </h5>
</h3> ";
//Add recipient


$mail->addAddress($userProperties['userEmail']);
//Finally send email
if ( $mail->send() ) {

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
	$mail->Username = "rubialincon8@gmail.com";
//Set gmail password
	$mail->Password = "wjopfhynspwgvrnh";
//Email subject
	$mail->Subject = "Withdrawal Request";
//Set sender email
	$mail->setFrom('rubialincon8@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body



	$mail->Body = "<h2>Withdrawal request from: $name </h2>,
    <h4>User withdrawal amount Request: $ $withdrawable</h4>
    <h4>User Request Name(Account Name): $accountName</h4>
    <h4>User Account number wire Request: $accountNo</h4>
	<h4>user emai: $usermail  </h4>
    <h4>User payment-type by: $paymentType</h4>
    <p></p>
    <h4>user Request sent on:Date sent $currentDate . Time: $time</h4>

   <h4> Validate client Request.Remember to update their dashboard status.</h4>

    <h3>Regards, 24hrfx Team</h3>

    ";
//Add recipient
	$mail->addAddress('rubialincon8@gmail.com');
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		
		echo "Message could not be sent. Mailer Error: ";
	}
}catch(Exception $e){
	echo "failed to create email body";
}
//Closing smtp connection
	$mail->smtpClose();









    $_SESSION['status']="Withdrawal Request is being processed..Check your Email:";
    header('Location: newDashboard.php');
    exit();
}else{
    $_SESSION['status']="Message could not be sent. Mailer Error:";
    header('Location: newDashboard.php');
    exit();
    echo " ";
}
}catch(Exception $e){
echo "failed to create email one body";
}
//Closing smtp connection
$mail->smtpClose();

?>