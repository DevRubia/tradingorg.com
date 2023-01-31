<?php
session_start();
include('conndb.php');


if(isset($_POST['save-contact']))
{
$fullname=$_POST['logname'];
$email=$_POST['logemail'];
$pass=$_POST['logpass'];
};

$userProperties = [
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
    'name' => $fullname,
];


    $customUserProperties = $database->getReference('users/'.$uid)->set($additionalProperties);

    $_SESSION['status']="sign in was successful";
    header('Location:landingpage.php');
    exit();
}else{
    $_SESSION['status']="sign in ERROR";
    header('Location:landingpage.php');
    exit();
}





 