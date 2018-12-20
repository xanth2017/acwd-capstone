<?php
use classes\business\UserManager;

require_once 'includes/autoload.php';

$formerror="";

$email="";
$password="";
if(isset($_REQUEST["submitted"])){
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];

    $UM=new UserManager();


    $existuser=$UM->getUserByEmailPassword($email,$password);
    


    if(isset($existuser)){
        session_start();
        $_SESSION['email']=$email;
		$_SESSION['id']=$existuser->id;

        header("Location:profile.php");
    }else{
        $formerror="Invalid User Name or Password";
        header("Location: home.php");
    }
}else{
    header("Location: home.php");
}

?>



