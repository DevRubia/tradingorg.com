<?php
session_start();
include('conndb.php');

require './phpmailer/includes/PHPMailer.php';
require './phpmailer/includes/SMTP.php';
require './phpmailer/includes/Exception.php';

//Create instance of PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if(isset($_POST['save-contact']))
{
$userName=$_POST['username'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass=$_POST['password'];
$confirmPass=$_POST['ConfirmPassword'];
$countryCode=$_POST['countryCode'];
$phoneNumber=$countryCode . $phone;
};


if($pass == $confirmPass){

    $userProperties = [
            'phone'=> $phoneNumber,
            'email' => $email,
            'password' => $pass,
            'displayName' => $fullname,
            'emailVerified'=> true
        ];   

        $createdUser = $auth->createUser($userProperties);

        if($createdUser){

            $uid = $createdUser->uid;

        $additionalProperties=[
            'accBal'=> 0,
            'earnedTotal'=>0,
            'withdrawal'=>0,
            'bonus'=>0,
            'userEmail' => $email,
            'name' => $userName,
            'AccName' => $fullname,
            'accountType'=> 'Mpesa',
            'accountNumber'=>$phoneNumber,
            'status'=>'NewInvestorAccount',
            'insuarance'=>0,
            'withdrawalFund'=>0
        ];


             $customUserProperties = $database->getReference('users/'.$uid)->set($additionalProperties);
//send email to user first time signup

  
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
	$mail->Subject = "24hrfx Registration welcome Mail";
//Set sender email
	$mail->setFrom($email);
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "<h1>24hrfx Trading Org </h1></br><h3>Congragulations user $userName for creating an account</h3>
	,<h5>We're thrilled to welcome you to 24hrfx Trading Org! Your account has been successfully created, and you're now part of a community of people who are passionate about current market trading trends.

	At 24hrfx Trading Org, we believe that trading should be accessible to everyone, and our goal is to make your experience as smooth and enjoyable as possible. Whether you're a seasoned trader enthusiast or just starting out, you'll find a wealth of information and resources here to help you reach your goals.
	
	To get started, we encourage you to start investments immmediately.
	
	We can't wait to see what adventures await you on 24hrfx Trading Org. If you have any questions or need help along the way, don't hesitate to reach out to our support team.
	
	Wishing you all the best,
	
	The 24hrfx Trading Org Team.<h5>";
//Add recipient
	$mail->addAddress('rubbyfadhili@gmail.com');
//Finally send email
	if ( $mail->send() ) {
		   $_SESSION['status']="sign in was successful..Check email to make sure you receive information appropriately";
            header('Location:landingpage.php');
            exit();
	}else{
		$_SESSION['status']="sign in Email not sent ..sign in was successful";
            header('Location:landingpage.php');
            exit();
		
	}
}catch(Exception $e){
	echo "failed to create email body";
}
//Closing smtp connection
	$mail->smtpClose();





            
        }else{
            $_SESSION['status']="sign in ERROR";
            header('Location:landingpage.php');
            exit();
        }
}else{
    $_SESSION['status']="passwords do not match";
    header('Location:landingpage.php');
    exit(); 
}




 