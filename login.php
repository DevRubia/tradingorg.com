<?php
session_start();
include('conndb.php');


if(isset($_POST['loginbtn'])){
    $email = $_POST['logemailres'];
    $clearTextPassword = $_POST['logpassres'];

    try {
       
        $user = $auth->getUserByEmail("$email");

 
        try{
                    $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
                $idTokenString = $signInResult->idToken();

                        try {
                            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                            $uid = $verifiedIdToken->claims()->get('sub');
                            $userProperties = $database->getReference('users/'. $user->uid)->getValue();
                            

                                $_SESSION['verifiedUserId'] = $uid;
                                $_SESSION['idTokenString'] = $idTokenString;
                            $_SESSION['userProperties'] = $userProperties;
                                
            

                                $_SESSION['status']="welcome to your Dashboard";
                                header('Location: dashboard.php');
                                exit();

                        } catch (FailedToVerifyToken $e) {

                            $_SESSION['status']="sign in";
                            header('Location: signinform.php');
                            exit();

                        }

                    }catch(Exception $e)
                            
                            {
                        $_SESSION['status']="Invalid password";
                        header('Location: landingpage.php');
                        exit();
                    }
            } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                    //echo $e->getMessage();
                    $_SESSION['status']="Invalid Email address";
                    header('Location: landingpage.php');
                    exit();
                }
            }

else{
    $_SESSION['status']="Not Authorised";
    header('Location: landingpage.php');
    exit();
}

?>