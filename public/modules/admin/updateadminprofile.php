<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/inneradminheader.php';
?>

<?php

$formerror="";
$firstName="";
$lastName="";
$email="";
$city="";
$company="";
$country="";
$password="";


if(!isset($_REQUEST["submitted"])){
  $UM=new UserManager();
  $existuser=$UM->getUserByEmail($_SESSION["email"]);
  $firstName=$existuser->firstName;
  $lastName=$existuser->lastName;
  $email=$existuser->email;
  $city=$existuser->city;
  $company=$existuser->company;
  $country=$existuser->country;
  $password=$existuser->password;
}else{
  $firstName=$_REQUEST["firstName"];
  $lastName=$_REQUEST["lastName"];
  $email=$_REQUEST["email"];
  $city=$_REQUEST["city"];
  $company=$_REQUEST["company"];
  $country=$_REQUEST["country"];
  $password=$_REQUEST["password"];

  if($firstName!='' && $lastName!='' && $email!='' && $city!='' && $company!='' && $country!='' && $password!=''){
       $update=true;
       $UM=new UserManager();
       if($email!=$_SESSION["email"]){
           $existuser=$UM->getUserByEmail($email);
           if(is_null($existuser)==false){
               $formerror="User Email already in use, unable to update email";
               echo $formerror;
               $update=false;
           }
       }
       if($update){
           $existuser=$UM->getUserByEmail($_SESSION["email"]);
           $existuser->firstName=$firstName;
           $existuser->lastName=$lastName;
           $existuser->email=$email;
           $existuser->city=$city;
           $existuser->company=$company;
           $existuser->country=$country;
           $existuser->password=$password;
           $UM->saveUser($existuser);
           $_SESSION["email"]=$email;
           header("Location:../../profile.php");
       }
  }else{
      $formerror="Please provide required values";
      echo $formerror;
  }
}
?>

    <!-- Start of html coding for the User Profile-->
    <div class="container-fluid mt-2" >

        <div class="row"></div>
        <div class="row ">
            <div class="col-md-3 "></div>
            <div class="col-md-6 col">

                <div class="card hovercard">
                    <div class="cardheader " style="background-image:url('../../upload/profilebg/matt-lewis-332180.jpg');">
                        <button id="fileupload-imagebg" style="background-color: whitesmoke;">
                            <input type="file">
                            <i class="fa fa-pencil" style="color: black;" aria-hidden="true"></i>
                        </button>

                    </div>
                    <div class="avatar">
                        <img alt="" src="http://lorempixel.com/100/100/people/9/">
                        <button id="fileupload-image-profile" style="background-color: whitesmoke;">
                            <input type="file">
                            <i class="fa fa-pencil" style="color: black;" aria-hidden="true"></i>
                        </button>
                    </div>

                    <div class="info">
                        <div class="title">
                            <a target="_blank" href="http://scripteden.com/">Update Profile</a>
                        </div>
                    </div>
                     <div class="card-text">
                        <div class="container-fluid">

                                <form name="myForm" method="post">
                                    <div class="row">
                                        <div class="col-6" >
                                            <div class="form-group text-left">
                                                <label for="firstName" class="updatelabel">First Name</label>
                                                <input type="text" class="form-control" id="firstName"
                                                       name="firstName" value="<?=$firstName?>"
                                                       aria-describedby="firstNameHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6" >
                                            <div class="form-group text-left">
                                                <label for="lastName" class="updatelabel">Last Name</label>
                                                <input type="text" class="form-control" id="lastName"
                                                       name="lastName" value="<?=$lastName?>"
                                                       aria-describedby="lastNameHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group text-left">
                                                <label for="email" class="updatelabel">Email Address</label>
                                                <input type="email" class="form-control" id="email"
                                                       name="email" value="<?=$email?>"
                                                       aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6" >
                                            <div class="form-group text-left">
                                                <label for="city" class="updatelabel">City</label>
                                                <input type="text" class="form-control" id="city"
                                                       name="city" value="<?=$city?>"
                                                       aria-describedby="cityHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6" >
                                            <div class="form-group text-left">
                                                <label for="country" class="updatelabel">Country</label>
                                                <input type="text" class="form-control" id="country"
                                                       name="country" value="<?=$country?>"
                                                       aria-describedby="countryHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" >
                                            <div class="form-group text-left">
                                                <label for="company" class="updatelabel">Company Name
                                                </label>
                                                <input type="text" class="form-control" id="company"
                                                       name="company" value="<?=$company?>"
                                                       aria-describedby="companyHelp" placeholder=" ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group text-left">
                                                <label for="password" class="updatelabel">New Password</label>
                                                <input type="password" class="form-control" id="password"
                                                       name="password" value="<?=$password?>"
                                                       aria-describedby="passwordHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group text-left">
                                                <label for="password" class="updatelabel">Confirm password</label>
                                                <input type="password" class="form-control" id="password"
                                                       name="cpassword" value="<?=$password?>"
                                                       aria-describedby="cpasswordHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-4"><?=$formerror?></div>
                                        <div class="col-4 mx-auto">
                                            <input type="hidden" name="submitted" value="1"><input type="submit" name="submit" value="Submit">
                                        </div>
                                        <div class="col-4"></div>
                                    </div>

                                </form>
                            </div>
                      </div>
                    </div>
                </div>

                </div>

       <div class="col-md-3"></div>
        </div>
        </div>

    </div>





<?php
include '../../includes/innerfooter.php';
?>
