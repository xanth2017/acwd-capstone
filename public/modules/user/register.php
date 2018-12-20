<?php
require_once '../../includes/autoload.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

session_start();

$formerror="";

$firstName="";
$lastName="";
$email="";
$password="";

if(isset($_REQUEST["submitted"])){
    $firstName=$_REQUEST["firstName"];
    $lastName=$_REQUEST["lastName"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];


    
    if($firstName!='' && $lastName!='' && $email!='' && $password!=''){
        $UM=new UserManager();
        $user=new User();
        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=$password;

        echo $firstName;

        $existuser=$UM->getUserByEmail($email);
    
        if(!isset($existuser)){
            // Save the Data to Database
            $UM->saveUser($user);
            $_SESSION["email"] = $user->email;
            header("Location:registerthankyou.php");
        }
        else{
            $formerror="User Already Exist";
            echo $formerror;
        }
    }else{
        $formerror="Please fill in the fields";
        echo $formerror;
    }
}





?>

