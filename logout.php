<?php
session_start();

unset($_SESSION['verifiedUserId']);
unset($_SESSION['idTokenString']);



if(isset($_SESSION['verifiedSuperAdmin'])){
    unset($_SESSION['verifiedSuperAdmin']);
    $_SESSION['status'] = "verifiedSuperAdmin Logged out successfully"; 

}elseif(isset($_SESSION['verifiedAdmin']));
{
    unset($_SESSION['verifiedAdmin']);
    $_SESSION['status'] = "verifiedAdmin Logged out successfully"; 
}
if(isset($_SESSION['expiryStatus'])){
    $_SESSION['status'] = "Session Expired";   
    header('Location: landingpage.php');
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