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
        $_SESSION['is_admin']=$existuser->is_admin;
        if($existuser->is_admin){
          header("Location: modules/admin/profile.php");
        }else{
          header("Location: modules/user/profile.php");
        }
    }else{
        $formerror="Invalid User Name or Password";
        header("Location: home.php");
    }
}else{
    header("Location: home.php");
}

?>
