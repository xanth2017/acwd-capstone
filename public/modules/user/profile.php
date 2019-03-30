<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/innerheader.php';
?>

<?php
$email="";
$existuser="";

$UM=new UserManager();
$existuser=$UM->getUserByEmail($_SESSION["email"]);


if(isset($existuser)){
    ?>

<!-- Start of html coding for the User Profile-->
    <div class="container-fluid mt-2" >

        <div class="row ">
            <div class="col-lg-3 col-sm-2"></div>
            <div class="col-lg-6 col-sm-8">

                <div class="card hovercard mb-4 pb-5">
                    <div class="cardheader" style="background-image:url('upload/profilebg/chris-lawton-154388.jpg');">

                    </div>
                    <div class="avatar">
                        <img alt="" src="http://lorempixel.com/100/100/people/9/">
                    </div>
                    <div class="info">
                        <div class="title mx-auto">
                            <h2 style=" color:cornflowerblue;"><?= $existuser->firstName ." "
                                .$existuser->lastName?></h2>

                            <!-- Button for Edit Profile -->
                            <button type="button" class="btn btn-primary edit-profile">
                                <a href="modules/user/updateprofile.php">
                                <i class="fa fa-pencil" style="color: black;" aria-hidden="true"></i></a>
                            </button>


                        </div>
                        <br>
                        <div class="desc mt-2">
                            <h6>Where we hang out during workdays <i class="fa fa-code-fork" aria-hidden="true"></i>
                                - <?= $existuser->company?></h6>
                        </div>
                        <br>
                        <div class="desc">
                            <h6>City where we sleep, eat and code <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                - <?= $existuser->city?></h6>
                        </div>
                        <br>
                        <div class="desc">
                            <h6>We staying at this part of the world <i class="fa fa-globe" aria-hidden="true"></i>
                                - <?= $existuser->country?></h6>
                        </div>
                        <br>
                    </div>
                    <div class="bottom">
                        <a class="btn btn-primary btn-twitter btn-sm social" href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm social" rel="publisher"
                           href="#">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a class="btn btn-primary btn-sm social" rel="publisher"
                           href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="btn btn-warning btn-sm social" rel="publisher" href="#">
                            <i class="fa fa-behance"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-sm-2"></div>
        </div>

    </div>


    <?php

        }else {
            header("Location:../../home.php");
        ?>

<?php


}
?>


<div class="fixed-bottom">
<?php
include '../../includes/footer.php';
?>
</div>
