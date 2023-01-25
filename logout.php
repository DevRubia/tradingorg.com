<?php
session_start();

unset($_SESSION['verifiedUserId']);
unset($_SESSION['idTokenString']);

if(isset($_SESSION['expiryStatus'])){
    $_SESSION['status'] = "Session Expired";   
    header('Location: logout.php');
    exit();
}
 else{
        $_SESSION['status'] = "session Logged out successfully";
        header('Location: landingpage.php');
    exit();
    }

$_SESSION['status']="Logged Out successfully";
    header('Location: landingpage.php');
    exit();


?>