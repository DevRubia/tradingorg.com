<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('conndb.php');

$timestamp=time();
$formatDate = "Y-m-d";
$formatTime="h:i:s A";
$currentDate = date($formatDate);


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
}

//email address to check
$userEmail = $email;
$userPhone = $phoneNumber;

try {
  
    $user = $auth->getUserByEmail($userEmail);
    
    
     if($user !== null) {
    // User exists
    $_SESSION['status']="ALERT: Email address exists";
    header('Location: https://24hrfxtradingorg.co.ke/landingpage.php');
    exit();
     }
     
    
} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    //echo $e->getMessage();
    $_SESSION['status']="Validating Entry";
    
 }

  
try  {
        $user1 = $auth->getUserByPhoneNumber($userPhone);
        
        if($user1 !== null) {
    // User exists
    $_SESSION['status']="ALERT:Phone Number exists";
    header('Location: landingpage.php');
    exit();
        
    }
}catch(\Kreait\Firebase\Exception\Auth\UserNotFound $e){
       $_SESSION['status']="Validating Entry";  
    }
  
//
$pattern = '/^[0-9]+$/';
//validate phoneNUmber
// Check if the numeric phone number has less than 10 digits or contains any letter characters
//ctype_digit(strval($value))
//

if (strlen($userPhone) <= 10) {
    // Throw an error or handle the validation failure
    $_SESSION['status']="ALERT:Invalid phone number! less or Invalid Charachters(*,+,|,?,/)";
    // You can also redirect the user back to the form or display an error message
    header('Location: landingpage.php');
    exit();
}

if(strlen($pass) < 8){
    $_SESSION['status']="ALERT:Password should be >= 8 charachters! include!@?/ Capital,upper,lowercase letters and numerics";
    header('Location: landingpage.php?error=shortPassword');
    exit();
}

//start of sign up Activation process
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
            'timestamp'=> $currentDate,
            'countryCode'=>$countryCode,
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
            'withdrawalFund'=>0,
            'depTransaction'=>'recent Transactions'
        ];


             $customUserProperties = $database->getReference('users/'.$uid)->set($additionalProperties);

//store username,currentdate and email in sessions
$_SESSION['username']=$userName;
$_SESSION['email']=$email;
$_SESSION['currentDate']=$currentDate;

             //send email to user first time signup

  

 $_SESSION['status']="success registration, please check your email ";
            header('Location: goToLogin.php');
           

     
        }else{
            $_SESSION['status']="sign in Error...";
            header('Location: landingpage.php');
            exit();
        }
}else{
    $_SESSION['status']="passwords do not match";
    header('Location: landingpage.php');
    exit(); 
}




 