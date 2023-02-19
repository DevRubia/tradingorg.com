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
            'accName' => $fullname,
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
	$mail->Username = "helpdesk.24hrfxtradingorg@gmail.com";
//Set gmail password
	$mail->Password = "opnytybzkqaymojo";
//Email subject
	$mail->Subject = "ACCOUNT REGISTRATION";
//Set sender email
	$mail->setFrom('helpdesk.24hrfxtradingorg@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "<h1>CONGRAGULATION User $userName !</h1></br><h2>WELCOME to 24HRFX TRADING ORG! 
    </h2>

	<h3> You are almost ready to start interacting with our investment services.
    Your account has been successfully created, and you're now part of a community of people who are passionate about current market trading trends. 
    Here at 24HRFX TRADING ORG, we believe that trading should be accessible to everyone, and our goal is to make your experience as smooth and enjoyable as possible.
    Whether you're a seasoned trader enthusiast or just starting out, you'll get PROFIT from our services.
    To get started, we encourage you to start investmenting immmediately.
    We can't wait to see what adventures await you on 24HRFX TRADING ORG.
	</h3>

    <h3> If you have any questions or need help along the way, don't hesitate to reach out to our support team.

    </h3>

    <h3> 
    Our Official Pages.
    Telegram : https://t.me/tg24HrFxTradingOrg
    </h3>
    
    <h3> 
    Instagram : http://www.instagram.com/24hrfx_tradingorg 
    </h3>

	<h5>Kind regards, </h5>
    <h5>Best Certified Investment Platform, </h5>
    <h5>The 24hrfx Trading Org Team. </h5>
    <h3>";
//Add recipient
	$mail->addAddress($email);
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
	        $_SESSION['status']="sign in Email not sent ..sign in was successful";
            header('Location:landingpage.php');
            exit();
		;
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




 