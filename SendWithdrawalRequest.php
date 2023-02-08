<?php

session_start();
if(isset($_POST['withdraw'])){

    // $paymentMode=$_POST['accountNo'];
    // $accountName=$_POST['accountName'];
    // $withdrawable=$_POST['withdrawable'];
    // //
    // $bank=$_POST['Bank-Transfer'];
    // $mpesa=$_POST['M-PESA-KENYA'];
    // $airtel=$_POST['AIRTEL-MONEY'];
    // $mtn=$_POST['MTN-MOBILE-MONEY'];
    // $bitcoin=$_POST['BITCOIN'];
    // //
    // $mpesa=$_POST['mpesa'];
    // $airtel=$_POST['airtel'];
    // $mtn=$_POST['mtn'];
    // $bitcoin=$_POST['bitcoin'];
    // $insuaranceTransactionId=$_POST['insuaranceTransactionId'];
    // //
    // $mpesa=$_POST['mpesaW'];
    // $airtel=$_POST['airtelW'];
    // $mtn=$_POST['mtnW'];
    // $bitcoin=$_POST['bitcoinW'];
    // $insuaranceTransactionId=$_POST['insuaranceTransactionIdW'];
    
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
$mail->setFrom('wickyfx@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Attachment
//$mail->addAttachment('img/attachment.png');
//Email body
$mail->Body = "<h2>
We have received your withdrawal request for $ 65.98 USD.
Withdrawal request is being processed... 
We aim to process all withdrawals within 24 hours, but it may take longer depending on the queue. We will let you know when the process is completed.

For card withdrawals, it will take 5 to 15 working days for your funds to appear in your account, depending on the card’s issuing bank.

If you have any questions, contact us via live chat on our website.</h2> ";
//Add recipient
$userProperties = $_SESSION['userProperties'];

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
	$mail->setFrom('wickyfx@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "Withdrawal request from ['name'] with account";
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